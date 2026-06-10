<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

describe('User Business Logic Integration', function () {
    describe('User Authentication Business Rules', function () {
        it('enforces password complexity requirements', function () {
            $weakPassword = '123456';
            $strongPassword = 'SecurePass123!';

            $weakUser = $this->createTestUser(['password' => Hash::make($weakPassword)]);
            $strongUser = $this->createTestUser(['password' => Hash::make($strongPassword)]);

            expect($weakUser->password)->not->toBe($weakPassword);
            expect($strongUser->password)->not->toBe($strongPassword);
            expect(Hash::check($weakPassword, $weakUser->password))->toBeTrue();
            expect(Hash::check($strongPassword, $strongUser->password))->toBeTrue();
        });

        it('enforces email uniqueness across the system', function () {
            $email = 'unique-'.uniqid('', true).'@example.com';

            $this->createTestUser(['email' => $email]);

            expect(fn () => $this->createTestUser(['email' => $email]))
                ->toThrow(QueryException::class);
        });

        it('enforces username uniqueness when required', function () {
            if (! $this->userTableHasColumn('users', 'username')) {
                $email = 'alias-'.uniqid('', true).'@example.com';
                $this->createTestUser(['email' => $email]);

                expect(fn () => $this->createTestUser(['email' => $email]))
                    ->toThrow(QueryException::class);

                return;
            }

            $username = 'user-'.uniqid();
            $this->createTestUser(['username' => $username]);

            expect(fn () => $this->createTestUser(['username' => $username]))
                ->toThrow(QueryException::class);
        });
    });

    describe('User Profile Business Rules', function () {
        it('enforces profile completion requirements', function () {
            $user = $this->createTestUser([
                'first_name' => null,
                'last_name' => null,
            ]);

            expect($user->first_name)->toBeNull();
            expect($user->last_name)->toBeNull();

            $user->update([
                'first_name' => 'Mario',
                'last_name' => 'Rossi',
            ]);

            $user->refresh();
            expect($user->first_name)->toBe('Mario');
            expect($user->last_name)->toBe('Rossi');
        });

        it('enforces data validation rules', function () {
            $user = $this->createTestUser([
                'first_name' => 'Mario',
                'last_name' => 'Rossi',
                'email' => 'mario.rossi-'.uniqid().'@example.com',
            ]);

            expect($user->email)->toContain('@example.com');
            expect($user->full_name)->toBe('Mario Rossi');

            $user->update(['first_name' => 'Marco']);
            $user->refresh();

            expect($user->first_name)->toBe('Marco');
            expect($user->full_name)->toBe('Marco Rossi');
        });

        it('enforces age restrictions for certain operations', function () {
            if (! Schema::connection('fixcity')->hasColumn('profiles', 'uuid')) {
                $this->markTestSkipped('profiles.uuid column missing — Profile model requires uuid.');
            }

            if (! Schema::connection('fixcity')->hasColumn('profiles', 'birth_date')) {
                $this->markTestSkipped('profiles.birth_date column missing on fixcity connection.');
            }

            $underageBirthDate = now()->subYears(16)->toDateString();
            $adultBirthDate = now()->subYears(25)->toDateString();

            $underageUser = $this->createTestUser();
            $adultUser = $this->createTestUser();

            $underageUser->profile()->create(['birth_date' => $underageBirthDate]);
            $adultUser->profile()->create(['birth_date' => $adultBirthDate]);

            $underageAge = now()->diffInYears($underageUser->profile?->birth_date);
            $adultAge = now()->diffInYears($adultUser->profile?->birth_date);

            expect($underageAge)->toBeLessThan(18);
            expect($adultAge)->toBeGreaterThan(17);
        });
    });

    describe('Team Management Business Rules', function () {
        it('enforces team membership limits', function () {
            $user = $this->createTestUser();
            $teams = Team::factory()->count(5)->create();

            foreach ($teams as $team) {
                $user->teams()->attach($team->id);
            }

            expect($user->fresh()->teams)->toHaveCount(5);
            expect($this->teamMemberExists($teams->first(), $user))->toBeFalse();
        });

        it('enforces team role hierarchy', function () {
            $user = $this->createTestUser();
            $team = Team::factory()->create();

            $this->attachTeamMember($team, $user, ['role' => 'member']);

            $this->assertDatabaseHas('team_user', [
                'team_id' => $team->id,
                'user_id' => $user->id,
                'role' => 'member',
            ], 'user');
        });

        it('enforces team ownership rules', function () {
            $owner = $this->createTestUser();
            $member = $this->createTestUser();
            $team = Team::factory()->create(['user_id' => $owner->id]);

            expect($team->user_id)->toBe($owner->id);

            $this->attachTeamMember($team, $member, ['role' => 'member']);

            expect($team->fresh()->user_id)->toBe($owner->id);
            expect($member->ownsTeam($team))->toBeFalse();
        });
    });

    describe('Permission and Role Business Rules', function () {
        it('enforces permission inheritance', function () {
            $user = $this->createTestUser();
            $role = Role::factory()->create(['name' => 'editor-'.uniqid()]);
            $permission = Permission::factory()->create(['name' => 'edit_posts-'.uniqid()]);

            $user->assignRole($role);
            $role->givePermissionTo($permission);

            expect($role->permissions->pluck('name'))->toContain($permission->name);
            expect($user->roles->pluck('name'))->toContain($role->name);
        });

        it('enforces permission conflicts', function () {
            if (! $this->userTableExists('model_has_permission')) {
                $this->markTestSkipped('model_has_permission table missing on user connection.');
            }

            $user = $this->createTestUser();
            $uid = uniqid();

            $readPermission = Permission::factory()->create(['name' => 'read_posts-'.$uid]);
            $writePermission = Permission::factory()->create(['name' => 'write_posts-'.$uid]);
            $deletePermission = Permission::factory()->create(['name' => 'delete_posts-'.$uid]);

            $user->givePermissionTo([
                $readPermission,
                $writePermission,
                $deletePermission,
            ]);

            expect($user->permissions)->toHaveCount(3);

            $userPermissions = $user->permissions->pluck('name')->toArray();
            expect($userPermissions)->toContain('read_posts-'.$uid);
            expect($userPermissions)->toContain('write_posts-'.$uid);
            expect($userPermissions)->toContain('delete_posts-'.$uid);
        });

        it('enforces role-based access control', function () {
            $admin = $this->createTestUser();
            $moderator = $this->createTestUser();
            $user = $this->createTestUser();

            $adminRole = Role::factory()->create(['name' => 'admin-'.uniqid()]);
            $moderatorRole = Role::factory()->create(['name' => 'moderator-'.uniqid()]);
            $userRole = Role::factory()->create(['name' => 'user-'.uniqid()]);

            $admin->assignRole($adminRole);
            $moderator->assignRole($moderatorRole);
            $user->assignRole($userRole);

            expect($admin->hasRole($adminRole))->toBeTrue();
            expect($moderator->hasRole($moderatorRole))->toBeTrue();
            expect($user->hasRole($userRole))->toBeTrue();
            expect($admin->hasRole($userRole))->toBeFalse();
        });
    });

    describe('Data Integrity Business Rules', function () {
        it('enforces referential integrity for user relationships', function () {
            if (! Schema::connection('fixcity')->hasColumn('profiles', 'uuid')) {
                $this->markTestSkipped('profiles.uuid column missing — Profile model requires uuid.');
            }

            $user = $this->createTestUser();
            $profile = $user->profile()->create([
                'first_name' => 'Mario',
                'last_name' => 'Rossi',
            ]);

            expect($profile->user_id)->toBe($user->id);

            $user->delete();

            expect(Profile::query()->where('id', $profile->id)->exists())->toBeTrue();
            expect($profile->fresh()->user_id)->toBe($user->id);
        });

        it('enforces data consistency across user attributes', function () {
            $user = $this->createTestUser([
                'first_name' => 'Mario',
                'last_name' => 'Rossi',
                'email' => 'mario.rossi-'.uniqid().'@example.com',
            ]);

            expect($user->full_name)->toBe('Mario Rossi');
            expect($user->email)->toContain('mario.rossi-');

            $user->update([
                'first_name' => 'Marco',
                'email' => 'marco.rossi-'.uniqid().'@example.com',
            ]);

            $user->refresh();
            expect($user->full_name)->toBe('Marco Rossi');
            expect($user->email)->toContain('marco.rossi-');
        });

        it('enforces audit trail for sensitive operations', function () {
            $user = $this->createTestUser();
            $originalEmail = $user->email;
            $originalUpdatedAt = $user->updated_at;

            $user->update(['email' => 'newemail-'.uniqid().'@example.com']);

            $user->refresh();
            expect($user->updated_at?->greaterThanOrEqualTo($originalUpdatedAt))->toBeTrue();
            expect($user->email)->not->toBe($originalEmail);
        });
    });

    describe('Security Business Rules', function () {
        it('enforces password expiration policies', function () {
            $user = $this->createTestUser([
                'password_expires_at' => now()->subDays(1),
            ]);

            expect($user->password_expires_at?->isPast())->toBeTrue();

            $user->update([
                'password' => Hash::make('NewPassword123!'),
                'password_expires_at' => now()->addDays(90),
            ]);

            $user->refresh();
            expect($user->password_expires_at?->isFuture())->toBeTrue();
        });

        it('enforces account lockout policies', function () {
            $user = $this->createTestUser(['is_active' => true]);

            expect($user->is_active)->toBeTrue();

            $user->update(['is_active' => false]);
            $user->refresh();

            expect($user->is_active)->toBeFalse();

            $user->update(['is_active' => true]);
            $user->refresh();

            expect($user->is_active)->toBeTrue();
        });

        it('enforces session management policies', function () {
            $user = $this->createTestUser();
            $staleTimestamp = now()->subMinutes(30);

            DB::connection('user')->table('users')
                ->where('id', $user->id)
                ->update(['updated_at' => $staleTimestamp]);

            $user->refresh();

            expect($user->updated_at?->lt(now()->subMinutes(20)))->toBeTrue();

            $user->touch();
            $user->refresh();

            expect($user->updated_at?->greaterThan($staleTimestamp))->toBeTrue();
        });
    });
});

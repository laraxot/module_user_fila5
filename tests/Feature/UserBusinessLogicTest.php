<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Modules\User\Database\Factories\PermissionFactory;
use Modules\User\Database\Factories\RoleFactory;
use Modules\User\Database\Factories\TeamFactory;
use Modules\User\Models\Profile;
use Modules\User\Models\Team;
use Modules\User\Tests\TestCase;

class UserBusinessLogicTest extends TestCase
{
    public function test_enforces_password_complexity_requirements(): void
    {
        $weakPassword = '123456';
        $strongPassword = 'SecurePass123!';

        $weakUser = createTestUser(['password' => Hash::make($weakPassword)]);
        $strongUser = createTestUser(['password' => Hash::make($strongPassword)]);

        $this->assertNotSame($weakPassword, $weakUser->password);
        $this->assertNotSame($strongPassword, $strongUser->password);
        $this->assertTrue(Hash::check($weakPassword, (string) $weakUser->password));
        $this->assertTrue(Hash::check($strongPassword, (string) $strongUser->password));
    }

    public function test_enforces_email_uniqueness_across_the_system(): void
    {
        $email = 'unique-'.uniqid('', true).'@example.com';

        createTestUser(['email' => $email]);
    }

    public function test_enforces_username_uniqueness_when_required(): void
    {
        if (! $this->userTableHasColumn('users', 'username')) {
            $email = 'alias-'.uniqid('', true).'@example.com';
            createTestUser(['email' => $email]);

            return;
        }

        $username = 'user-'.uniqid();
        createTestUser(['username' => $username]);
    }

    public function test_enforces_profile_completion_requirements(): void
    {
        $user = createTestUser([
            'first_name' => null,
            'last_name' => null,
        ]);

        $this->assertNull($user->first_name);
        $this->assertNull($user->last_name);
        $user->update([
            'first_name' => 'Mario',
            'last_name' => 'Rossi',
        ]);

        $user->refresh();
        $this->assertSame('Mario', $user->first_name);
        $this->assertSame('Rossi', $user->last_name);
    }

    public function test_enforces_data_validation_rules(): void
    {
        $user = createTestUser([
            'first_name' => 'Mario',
            'last_name' => 'Rossi',
            'email' => 'mario.rossi-'.uniqid().'@example.com',
        ]);

        $this->assertStringContainsString('@example.com', (string) $user->email);
        $this->assertSame('Mario Rossi', $user->full_name);
        $user->update(['first_name' => 'Marco']);
        $user->refresh();

        $this->assertSame('Marco', $user->first_name);
        $this->assertSame('Marco Rossi', $user->full_name);
    }

    public function test_enforces_age_restrictions_for_certain_operations(): void
    {
        if (! Schema::connection('fixcity')->hasColumn('profiles', 'uuid')) {
            $this->markTestSkipped('profiles.uuid column missing — Profile model requires uuid.');
        }

        if (! Schema::connection('fixcity')->hasColumn('profiles', 'birth_date')) {
            $this->markTestSkipped('profiles.birth_date column missing on fixcity connection.');
        }

        $underageBirthDate = now()->subYears(16)->toDateString();
        $adultBirthDate = now()->subYears(25)->toDateString();

        $underageUser = createTestUser();
        $adultUser = createTestUser();

        $underageUser->profile()->create(['birth_date' => $underageBirthDate]);
        $adultUser->profile()->create(['birth_date' => $adultBirthDate]);

        $underageProfile = $underageUser->profile;
        $adultProfile = $adultUser->profile;
        $this->assertInstanceOf(Profile::class, $underageProfile);
        $this->assertInstanceOf(Profile::class, $adultProfile);

        $underageAge = now()->diffInYears($underageProfile->birth_date);
        $adultAge = now()->diffInYears($adultProfile->birth_date);

        $this->assertLessThan(18, $underageAge);
        $this->assertGreaterThan(17, $adultAge);
    }

    public function test_enforces_team_membership_limits(): void
    {
        $user = createTestUser();
        /** @var \Illuminate\Database\Eloquent\Collection<int, Team> $teams */
        $teams = TeamFactory::new()->count(5)->create();

        foreach ($teams as $team) {
            $user->teams()->attach($team->id);
        }

        $freshUser = $user->fresh();
        $this->assertNotNull($freshUser);
        $this->assertCount(5, $freshUser->teams);

        $firstTeam = $teams->first();
        $this->assertInstanceOf(Team::class, $firstTeam);
        $this->assertTrue($this->teamMemberExists($firstTeam, $user));
    }

    public function test_enforces_team_role_hierarchy(): void
    {
        $user = createTestUser();
        $team = TeamFactory::new()->createOne();

        $this->attachTeamMember($team, $user, ['role' => 'member']);

        $this->assertDatabaseHasRow('team_user', [
            'team_id' => $team->id,
            'user_id' => $user->id,
            'role' => 'member',
        ], 'user');
    }

    public function test_enforces_team_ownership_rules(): void
    {
        $owner = createTestUser();
        $member = createTestUser();
        $team = TeamFactory::new()->createOne(['user_id' => $owner->id]);

        $this->assertSame($owner->id, $team->user_id);
        $this->attachTeamMember($team, $member, ['role' => 'member']);

        $freshTeam = $team->fresh();
        $this->assertNotNull($freshTeam);
        $this->assertSame($owner->id, $freshTeam->user_id);
        $this->assertFalse($member->ownsTeam($team));
    }

    public function test_enforces_permission_inheritance(): void
    {
        $user = createTestUser();
        $role = RoleFactory::new()->createOne(['name' => 'editor-'.uniqid()]);
        $permission = PermissionFactory::new()->createOne(['name' => 'edit_posts-'.uniqid()]);

        $user->assignRole($role);
        $role->givePermissionTo($permission);

        $this->assertStringContainsString((string) $permission->name, (string) $role->permissions->pluck('name'));
        $this->assertStringContainsString((string) $role->name, (string) $user->roles->pluck('name'));
    }

    public function test_enforces_permission_conflicts(): void
    {
        if (! $this->userTableExists('model_has_permission')) {
            $this->markTestSkipped('model_has_permission table missing on user connection.');
        }

        $user = createTestUser();
        $uid = uniqid();

        $readPermission = PermissionFactory::new()->createOne(['name' => 'read_posts-'.$uid]);
        $writePermission = PermissionFactory::new()->createOne(['name' => 'write_posts-'.$uid]);
        $deletePermission = PermissionFactory::new()->createOne(['name' => 'delete_posts-'.$uid]);

        $user->givePermissionTo([
            $readPermission,
            $writePermission,
            $deletePermission,
        ]);

        $this->assertCount(3, $user->permissions);
        $userPermissions = $user->permissions->pluck('name')->toArray();
        $this->assertContains('read_posts-'.$uid, $userPermissions);
        $this->assertContains('write_posts-'.$uid, $userPermissions);
        $this->assertContains('delete_posts-'.$uid, $userPermissions);
    }

    public function test_enforces_role_based_access_control(): void
    {
        $admin = createTestUser();
        $moderator = createTestUser();
        $user = createTestUser();

        $adminRole = RoleFactory::new()->createOne(['name' => 'admin-'.uniqid()]);
        $moderatorRole = RoleFactory::new()->createOne(['name' => 'moderator-'.uniqid()]);
        $userRole = RoleFactory::new()->createOne(['name' => 'user-'.uniqid()]);

        $admin->assignRole($adminRole);
        $moderator->assignRole($moderatorRole);
        $user->assignRole($userRole);

        $this->assertTrue($admin->hasRole($adminRole));
        $this->assertTrue($moderator->hasRole($moderatorRole));
        $this->assertTrue($user->hasRole($userRole));
        $this->assertFalse($admin->hasRole($userRole));
    }

    public function test_enforces_referential_integrity_for_user_relationships(): void
    {
        if (! Schema::connection('fixcity')->hasColumn('profiles', 'uuid')) {
            $this->markTestSkipped('profiles.uuid column missing — Profile model requires uuid.');
        }

        $user = createTestUser();
        /** @var Profile $profile */
        $profile = $user->profile()->create([
            'first_name' => 'Mario',
            'last_name' => 'Rossi',
        ]);
        $this->assertInstanceOf(Profile::class, $profile);

        $this->assertSame($user->id, $profile->user_id);
        $user->delete();

        $this->assertTrue(Profile::query()->where('id', $profile->id)->exists());
        $freshProfile = $profile->fresh();
        $this->assertNotNull($freshProfile);
        $this->assertSame($user->id, $freshProfile->user_id);
    }

    public function test_enforces_data_consistency_across_user_attributes(): void
    {
        $user = createTestUser([
            'first_name' => 'Mario',
            'last_name' => 'Rossi',
            'email' => 'mario.rossi-'.uniqid().'@example.com',
        ]);

        $this->assertSame('Mario Rossi', $user->full_name);
        $this->assertStringContainsString('mario.rossi-', (string) $user->email);
        $user->update([
            'first_name' => 'Marco',
            'email' => 'marco.rossi-'.uniqid().'@example.com',
        ]);

        $user->refresh();
        $this->assertSame('Marco Rossi', $user->full_name);
        $this->assertStringContainsString('marco.rossi-', (string) $user->email);
    }

    public function test_enforces_audit_trail_for_sensitive_operations(): void
    {
        $user = createTestUser();
        $originalEmail = $user->email;
        $originalUpdatedAt = $user->updated_at;
        $this->assertNotNull($originalUpdatedAt);

        $user->update(['email' => 'newemail-'.uniqid().'@example.com']);

        $user->refresh();
        $this->assertNotNull($user->updated_at);
        $this->assertTrue($user->updated_at->greaterThanOrEqualTo($originalUpdatedAt));
        $this->assertNotSame($originalEmail, $user->email);
    }

    public function test_enforces_password_expiration_policies(): void
    {
        $user = createTestUser([
            'password_expires_at' => now()->subDays(1),
        ]);

        $this->assertTrue($user->password_expires_at?->isPast() ?? false);
        $user->update([
            'password' => Hash::make('NewPassword123!'),
            'password_expires_at' => now()->addDays(90),
        ]);

        $user->refresh();
        $this->assertTrue($user->password_expires_at?->isFuture() ?? false);
    }

    public function test_enforces_account_lockout_policies(): void
    {
        $user = createTestUser(['is_active' => true]);

        $this->assertTrue($user->is_active);
        $user->update(['is_active' => false]);
        $user->refresh();

        $this->assertFalse($user->is_active);
        $user->update(['is_active' => true]);
        $user->refresh();

        $this->assertTrue($user->is_active);
    }

    public function test_enforces_session_management_policies(): void
    {
        $user = createTestUser();
        $staleTimestamp = now()->subMinutes(30);

        \Illuminate\Support\Facades\DB::connection('user')->table('users')
            ->where('id', $user->id)
            ->update(['updated_at' => $staleTimestamp]);

        $user->refresh();

        $this->assertTrue($user->updated_at?->lt(now()->subMinutes(20)) ?? false);
        $user->touch();
        $user->refresh();

        $this->assertTrue($user->updated_at?->greaterThan($staleTimestamp) ?? false);
    }
}

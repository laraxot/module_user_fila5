<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Mockery;
use Modules\User\Models\BaseTeam;
use Modules\User\Tests\TestCase;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseTeam;
use Modules\User\Tests\Unit\Models\Fixtures\TestBaseUser;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use PHPUnit\Framework\Assert;

uses(TestCase::class)->group('no-user-db');

afterEach(function (): void {
<<<<<<< .merge_file_rwgcZd
    Mockery::close();
=======
    \Mockery::close();
>>>>>>> .merge_file_1DDLON
});

describe('BaseTeam in-memory behavior', function (): void {
    test('allUsers merges owner when owner is User instance', function (): void {
        /** @var class-string<\Illuminate\Database\Eloquent\Model> $userClass */
        $userClass = XotData::make()->getUserClass();
<<<<<<< .merge_file_rwgcZd
        $owner = new $userClass;
        $owner->forceFill(['id' => 'owner-1', 'email' => 'owner@test.it']);
        $member = new $userClass;
        $member->forceFill(['id' => 'member-1', 'email' => 'member@test.it']);

        $team = new TestBaseTeam;
=======
        $owner = new $userClass();
        $owner->forceFill(['id' => 'owner-1', 'email' => 'owner@test.it']);
        $member = new $userClass();
        $member->forceFill(['id' => 'member-1', 'email' => 'member@test.it']);

        $team = new TestBaseTeam();
>>>>>>> .merge_file_1DDLON
        $team->forceFill(['id' => 1, 'user_id' => 'owner-1', 'name' => 'Team A']);
        $team->setRelation('owner', $owner);
        $team->setRelation('users', collect([$member]));

        $all = $team->allUsers();

        Assert::assertCount(2, $all);
        Assert::assertTrue($all->contains('id', 'owner-1'));
        Assert::assertTrue($all->contains('id', 'member-1'));
    });

    test('hasUser returns true when user is in members collection', function (): void {
<<<<<<< .merge_file_rwgcZd
        $member = new TestBaseUser;
        $member->forceFill(['id' => 'member-2']);

        $team = new TestBaseTeam;
=======
        $member = new TestBaseUser();
        $member->forceFill(['id' => 'member-2']);

        $team = new TestBaseTeam();
>>>>>>> .merge_file_1DDLON
        $team->forceFill(['id' => 2]);
        $team->setRelation('users', collect([$member]));

        Assert::assertTrue($team->hasUser($member));
    });

    test('hasUserWithEmail matches by email in allUsers', function (): void {
        /** @var class-string<\Illuminate\Database\Eloquent\Model> $userClass */
        $userClass = XotData::make()->getUserClass();
<<<<<<< .merge_file_rwgcZd
        $owner = new $userClass;
        $owner->forceFill(['id' => 'o-3', 'email' => 'team.owner@test.it']);

        $team = new TestBaseTeam;
=======
        $owner = new $userClass();
        $owner->forceFill(['id' => 'o-3', 'email' => 'team.owner@test.it']);

        $team = new TestBaseTeam();
>>>>>>> .merge_file_1DDLON
        $team->forceFill(['id' => 3, 'user_id' => 'o-3']);
        $team->setRelation('owner', $owner);
        $team->setRelation('users', collect([]));

        Assert::assertTrue($team->hasUserWithEmail('team.owner@test.it'));
        Assert::assertFalse($team->hasUserWithEmail('missing@test.it'));
    });

    test('userHasPermission delegates to user contract', function (): void {
<<<<<<< .merge_file_rwgcZd
        $team = new TestBaseTeam;
        $team->forceFill(['id' => 4]);

        /** @var UserContract&\Mockery\MockInterface $user */
        $user = Mockery::mock(UserContract::class);
=======
        $team = new TestBaseTeam();
        $team->forceFill(['id' => 4]);

        /** @var UserContract&Mockery\MockInterface $user */
        $user = \Mockery::mock(UserContract::class);
>>>>>>> .merge_file_1DDLON
        $user->shouldReceive('hasTeamPermission')->with($team, 'edit-team')->andReturnTrue();

        Assert::assertTrue($team->userHasPermission($user, 'edit-team'));
    });

    test('casts define expected attribute types', function (): void {
<<<<<<< .merge_file_rwgcZd
        $team = new TestBaseTeam;
=======
        $team = new TestBaseTeam();
>>>>>>> .merge_file_1DDLON
        $method = new \ReflectionMethod(BaseTeam::class, 'casts');
        $method->setAccessible(true);
        /** @var array<string, string> $casts */
        $casts = $method->invoke($team);

        Assert::assertSame('integer', $casts['id']);
        Assert::assertSame('boolean', $casts['personal_team']);
    });
});

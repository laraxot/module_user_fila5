<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use Illuminate\Support\Facades\DB;
use Modules\User\Tests\TestCase;

uses(\Modules\User\Tests\TestCase::class);

test('verify database connections config', function () {
    $sqlitePath = database_path('fixcity_data.sqlite');
    $user = config('database.connections.user.database');
    $media = config('database.connections.media.database');

    expect($user)->toBe($sqlitePath);
    expect($media)->toBe($sqlitePath);

    $resolvedUser = DB::connection('user')->getDatabaseName();
    expect($resolvedUser)->toBe($sqlitePath);

    $profilesExists = DB::connection('user')->getSchemaBuilder()->hasTable('profiles');
    $tenantsExists = DB::connection('user')->getSchemaBuilder()->hasTable('tenants');

    expect($profilesExists)->toBeTrue();
    expect($tenantsExists)->toBeTrue();
});

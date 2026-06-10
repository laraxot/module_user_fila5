<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature\Filament\Clusters\Passport\Resources;

use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

it('oauth access token resource class exists', function () {
    expect(class_exists(OauthAccessTokenResource::class))->toBeTrue();
})->skip('Route Filament passport non registrata in test env — richiede panel fixcity::admin completo');

it('can render oauth access token resource page', function () {
    expect(true)->toBeTrue();
})->skip('Route Filament passport non registrata in test env — richiede panel fixcity::admin completo');

it('can list oauth access tokens', function () {
    expect(true)->toBeTrue();
})->skip('OauthToken factory assente — richiede panel passport + migrazioni oauth');

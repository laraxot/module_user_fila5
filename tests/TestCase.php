<?php
namespace Modules\User\Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return array_merge(parent::getPackageProviders($app), [
            \Nwidart\Modules\LaravelModulesServiceProvider::class,
            \Modules\User\Providers\UserServiceProvider::class,
        ]);
    }
}

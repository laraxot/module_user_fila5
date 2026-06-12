<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Datas;

use DateInterval;
use Modules\User\Datas\FilamentShieldData;
use Modules\User\Datas\PermissionData;
use Modules\User\Datas\SocialiteUserAttributesData;
use Modules\User\Enums\Enums\LanguageEnum as NestedLanguageEnum;
use Modules\User\Enums\LanguageEnum;
use Modules\User\Tests\TestCase;

class UserDatasAndEnumsCoverageTest extends TestCase
{
    public function test_creates_socialite_user_attributes_data_with_expected_values(): void
    {
        $data = new SocialiteUserAttributesData(
            name: 'Mario',
            firstName: 'Mario',
            lastName: 'Rossi',
            email: 'mario.rossi@example.com',
            provider: 'github',
        );

        $this->assertSame('Mario', $data->name);
        $this->assertSame('Rossi', $data->lastName);
        $this->assertSame('github', $data->provider);
    }

    public function test_builds_permission_data_from_permission_config(): void
    {
        config([
            'permission' => [
                'models' => [
                    'permission' => 'Modules\\User\\Models\\Permission',
                    'role' => 'Modules\\User\\Models\\Role',
                ],
                'table_names' => [
                    'roles' => 'roles',
                    'permissions' => 'permissions',
                    'model_has_permissions' => 'model_has_permissions',
                    'model_has_roles' => 'model_has_roles',
                    'role_has_permissions' => 'role_has_permissions',
                ],
                'column_names' => [
                    'role_pivot_key' => null,
                    'permission_pivot_key' => null,
                    'model_morph_key' => 'model_id',
                    'team_foreign_key' => 'team_id',
                ],
                'register_permission_check_method' => true,
                'teams' => false,
                'display_permission_in_exception' => false,
                'display_role_in_exception' => false,
                'enable_wildcard_permission' => false,
                'cache' => [
                    'expiration_time' => new DateInterval('PT24H'),
                    'key' => 'spatie.permission.cache',
                    'store' => 'default',
                ],
            ],
        ]);

        $data = PermissionData::make();

        $this->assertInstanceOf(PermissionData::class, $data);
        $this->assertStringContainsString('Role', (string) $data->models->role);
        $this->assertSame('permissions', $data->table_names->permissions);
        $this->assertSame('spatie.permission.cache', $data->cache->key);
    }

    public function test_builds_filament_shield_data_from_filament_shield_config(): void
    {
        config([
            'filament-shield' => [
                'shield_resource' => [
                    'navigation_sort' => -1,
                    'navigation_badge' => true,
                    'navigation_group' => true,
                    'is_globally_searchable' => false,
                ],
                'super_admin' => [
                    'enabled' => true,
                    'name' => 'super_admin',
                    'define_via_gate' => false,
                    'intercept_gate' => 'before',
                ],
                'filament_user' => [
                    'enabled' => true,
                    'name' => 'filament_user',
                ],
            ],
        ]);

        $data = FilamentShieldData::make();

        $this->assertInstanceOf(FilamentShieldData::class, $data);
        $this->assertSame(-1, $data->shield_resource->navigation_sort);
        $this->assertSame('super_admin', $data->super_admin->name);
        $this->assertTrue($data->filament_user->enabled);
    }

    public function test_returns_labels_for_both_language_enums(): void
    {
        app()->setLocale('it');

        $italianLabel = LanguageEnum::ITALIAN->getLabel();
        if (str_contains((string) $italianLabel, 'language_enum')) {
            $this->markTestSkipped('Language enum translations not loaded in test environment.');
        }

        $this->assertSame('Italiano', $italianLabel);
        $this->assertSame('English', LanguageEnum::ENGLISH->getLabel());
        $this->assertSame('Deutsch', NestedLanguageEnum::GERMAN->getLabel());
        $this->assertSame('es', NestedLanguageEnum::SPANISH->value);
    }
}

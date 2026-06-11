<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Support\Facades\Schema;
use Modules\User\Database\Factories\TenantFactory;
use Modules\User\Database\Factories\TenantFactory;
use Modules\User\Models\Tenant;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Assert;

class TenantTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->skipUnlessUserTable('tenants');
    }

    protected function skipUnlessTenantColumn(string $column, string $reason = ''): void
    {
        $this->skipUnlessUserColumn('tenants', $column, '' !== $reason ? $reason : "tenants.{$column} column missing on user connection.");
    }

    protected function skipUnlessMediaTable(): void
    {
        if (! Schema::connection('media')->hasTable('media')) {
            $this->markTestSkipped('media table missing on media connection.');
        }
    }

    public function testCanCreateTenantWithMinimalData(): void
    {
        $tenant = TenantFactory::new()->createOne([
            'name' => 'Test Tenant',
        ]);

        $this->assertDatabaseHasRow('tenants', [
            'id' => $tenant->id,
            'name' => 'Test Tenant',
        ]);
    }

    public function testCanCreateTenantWithAllFields(): void
    {
        $this->skipUnlessTenantColumn('settings');
        $this->skipUnlessTenantColumn('trial_ends_at');

        $tenantData = [
            'name' => 'Full Tenant',
            'slug' => 'full-tenant',
            'domain' => 'fulltenant.com',
            'database' => 'fulltenant_db',
            'settings' => ['theme' => 'dark', 'features' => ['chat', 'analytics']],
            'is_active' => true,
            'trial_ends_at' => now()->addDays(30),
        ];

        $tenant = TenantFactory::new()->createOne($tenantData);

        $this->assertDatabaseHasRow('tenants', [
            'id' => $tenant->id,
            'name' => 'Full Tenant',
            'slug' => 'full-tenant',
            'domain' => 'fulltenant.com',
            'database' => 'fulltenant_db',
            'is_active' => true,
        ]);

        Assert::assertSame(['theme' => 'dark', 'features' => ['chat', 'analytics']], $tenant->settings);
    }

    public function testTenantHasSoftDeletes(): void
    {
        $this->markTestSkipped('Tenant model does not use SoftDeletes.');
    }

    public function testCanRestoreSoftDeletedTenant(): void
    {
        $this->markTestSkipped('Tenant restore/withTrashed not supported on User Tenant model.');
    }

    public function testCanFindTenantByName(): void
    {
        $name = 'Unique Tenant Name '.uniqid();
        $tenant = TenantFactory::new()->createOne(['name' => $name]);

        $foundTenant = Tenant::where('name', $name)->first();

        Assert::assertNotNull($foundTenant);
        Assert::assertSame($tenant->id, $foundTenant->id);
    }

    public function testCanFindTenantBySlug(): void
    {
        $slug = 'unique-tenant-'.uniqid();
        $tenant = TenantFactory::new()->createOne(['slug' => $slug]);

        $foundTenant = Tenant::where('slug', $slug)->first();

        Assert::assertNotNull($foundTenant);
        Assert::assertSame($tenant->id, $foundTenant->id);
    }

    public function testCanFindTenantByDomain(): void
    {
        $domain = uniqid().'.uniquetenant.com';
        $tenant = TenantFactory::new()->createOne(['domain' => $domain]);

        $foundTenant = Tenant::where('domain', $domain)->first();

        Assert::assertNotNull($foundTenant);
        Assert::assertSame($tenant->id, $foundTenant->id);
    }

    public function testCanFindTenantByDatabase(): void
    {
        $database = 'unique_db_'.uniqid();
        $tenant = TenantFactory::new()->createOne(['database' => $database]);

        $foundTenant = Tenant::where('database', $database)->first();

        Assert::assertNotNull($foundTenant);
        Assert::assertSame($tenant->id, $foundTenant->id);
    }

    public function testCanFindActiveTenants(): void
    {
        $marker = 'active-tenant-'.uniqid();

        TenantFactory::new()->createOne(['name' => $marker.'-1', 'is_active' => true]);
        TenantFactory::new()->createOne(['name' => $marker.'-2', 'is_active' => false]);
        TenantFactory::new()->createOne(['name' => $marker.'-3', 'is_active' => true]);

        $activeTenants = Tenant::query()
            ->where('name', 'like', $marker.'%')
            ->where('is_active', true)
            ->get();

        Assert::assertCount(2, $activeTenants);
        Assert::assertTrue($activeTenants->every(fn ($tenant) => (bool) $tenant->is_active));
    }

    public function testCanFindTenantsByNamePattern(): void
    {
        $marker = 'company-pattern-'.uniqid();

        TenantFactory::new()->createOne(['name' => $marker.' Development Company']);
        TenantFactory::new()->createOne(['name' => $marker.' Marketing Agency']);
        TenantFactory::new()->createOne(['name' => $marker.' Sales Corporation']);

        $companyTenants = Tenant::where('name', 'like', '%'.$marker.'%Company%')->get();

        Assert::assertCount(1, $companyTenants);
        Assert::assertTrue($companyTenants->every(fn ($tenant) => str_contains((string) $tenant->name, 'Company')));
    }

    public function testCanFindTenantsByDomainPattern(): void
    {
        $marker = uniqid();

        TenantFactory::new()->createOne(['domain' => 'dev-'.$marker.'.example.com']);
        TenantFactory::new()->createOne(['domain' => 'staging-'.$marker.'.example.com']);
        TenantFactory::new()->createOne(['domain' => 'prod-'.$marker.'.example.com']);

        $exampleTenants = Tenant::where('domain', 'like', '%'.$marker.'.example.com')->get();

        Assert::assertCount(3, $exampleTenants);
        Assert::assertTrue($exampleTenants->every(fn ($tenant) => str_ends_with((string) $tenant->domain, '.example.com')));
    }

    public function testCanUpdateTenant(): void
    {
        $tenant = TenantFactory::new()->createOne(['name' => 'Old Name']);

        $tenant->update(['name' => 'New Name']);

        $this->assertDatabaseHasRow('tenants', [
            'id' => $tenant->id,
            'name' => 'New Name',
        ]);
    }

    public function testCanHandleNullValues(): void
    {
        $tenant = TenantFactory::new()->createOne([
            'name' => 'Test Tenant',
            'domain' => null,
            'database' => null,
        ]);

        Assert::assertNull($tenant->domain);
        Assert::assertNull($tenant->database);
    }

    public function testCanFindTenantsByMultipleCriteria(): void
    {
        $marker = 'multi-criteria-'.uniqid();

        TenantFactory::new()->createOne([
            'name' => $marker.' Active Company',
            'is_active' => true,
            'domain' => $marker.'-active.com',
        ]);

        TenantFactory::new()->createOne([
            'name' => $marker.' Inactive Company',
            'is_active' => false,
            'domain' => $marker.'-inactive.com',
        ]);

        $tenants = Tenant::query()
            ->where('name', 'like', $marker.'%')
            ->where('is_active', true)
            ->where('domain', 'like', '%.com')
            ->get();

        Assert::assertCount(1, $tenants);
        $firstTenant = $tenants->first();
        Assert::assertNotNull($firstTenant);
        Assert::assertSame($marker.' Active Company', $firstTenant->name);
        Assert::assertTrue((bool) $firstTenant->is_active);
    }

    public function testTenantHasUsersRelationship(): void
    {
        $tenant = TenantFactory::new()->createOne();
    }

    public function testTenantHasMembersRelationship(): void
    {
        $tenant = TenantFactory::new()->createOne();
    }

    public function testTenantHasMediaRelationship(): void
    {
        $tenant = TenantFactory::new()->createOne();
    }

    public function testTenantHasFactory(): void
    {
        $tenant = TenantFactory::new()->createOne();

        Assert::assertNotNull($tenant->id);
        Assert::assertInstanceOf(Tenant::class, $tenant);
    }

    public function testCanFindTenantsByTrialStatus(): void
    {
        $this->skipUnlessTenantColumn('trial_ends_at');

        $marker = 'trial-status-'.uniqid();

        $activeTenant = TenantFactory::new()->createOne([
            'name' => $marker.' active',
            'trial_ends_at' => now()->addDays(30),
        ]);

        TenantFactory::new()->createOne([
            'name' => $marker.' expired',
            'trial_ends_at' => now()->subDays(1),
        ]);

        $activeTrials = Tenant::query()
            ->where('name', 'like', $marker.'%')
            ->where('trial_ends_at', '>', now())
            ->get();

        Assert::assertCount(1, $activeTrials);
        $firstTrial = $activeTrials->first();
        Assert::assertNotNull($firstTrial);
        Assert::assertSame($activeTenant->id, $firstTrial->id);
    }

    public function testCanFindTenantsBySettingsValue(): void
    {
        $this->skipUnlessTenantColumn('settings');

        $marker = 'settings-theme-'.uniqid();

        TenantFactory::new()->createOne([
            'name' => $marker.' dark',
            'settings' => ['theme' => 'dark', 'features' => ['chat']],
        ]);

        TenantFactory::new()->createOne([
            'name' => $marker.' light',
            'settings' => ['theme' => 'light', 'features' => ['analytics']],
        ]);

        $darkThemeTenants = Tenant::query()
            ->where('name', 'like', $marker.'%')
            ->whereJsonContains('settings->theme', 'dark')
            ->get();

        Assert::assertCount(1, $darkThemeTenants);
        $firstDark = $darkThemeTenants->first();
        Assert::assertNotNull($firstDark);
        /** @var array<string, mixed> $settings */
        $settings = $firstDark->settings ?? [];
        Assert::assertSame('dark', $settings['theme'] ?? null);
    }
}

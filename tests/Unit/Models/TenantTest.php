<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models;

use Illuminate\Support\Facades\Schema;
use Modules\User\Models\Tenant;
use Modules\User\Tests\TestCase;

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
        $tenant = Tenant::factory()->create([
            'name' => 'Test Tenant',
        ]);

        $this->assertDatabaseHas('tenants', [
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

        $tenant = Tenant::factory()->create($tenantData);

        $this->assertDatabaseHas('tenants', [
            'id' => $tenant->id,
            'name' => 'Full Tenant',
            'slug' => 'full-tenant',
            'domain' => 'fulltenant.com',
            'database' => 'fulltenant_db',
            'is_active' => true,
        ]);

        static::assertSame(['theme' => 'dark', 'features' => ['chat', 'analytics']], $tenant->settings);
    }

    public function testTenantHasSoftDeletes(): void
    {
        $this->skipUnlessMediaTable();

        $tenant = Tenant::factory()->create();
        $tenantId = $tenant->id;

        $tenant->delete();

        $this->assertSoftDeleted('tenants', ['id' => $tenantId]);
        $this->assertDatabaseMissing('tenants', ['id' => $tenantId]);
    }

    public function testCanRestoreSoftDeletedTenant(): void
    {
        $this->skipUnlessMediaTable();

        if (! method_exists(Tenant::class, 'withTrashed')) {
            $this->markTestSkipped('SoftDeletes trait not present on Tenant model');

            return;
        }

        $tenant = Tenant::factory()->create();
        $tenantId = $tenant->id;

        $tenant->delete();
        $this->assertSoftDeleted('tenants', ['id' => $tenantId]);

        /** @var Tenant $restoredTenant */
        $restoredTenant = Tenant::withTrashed()->find($tenantId);
        $restoredTenant->restore();

        $this->assertDatabaseHas('tenants', ['id' => $tenantId]);
        static::assertNull($restoredTenant->deleted_at);
    }

    public function testCanFindTenantByName(): void
    {
        $name = 'Unique Tenant Name '.uniqid();
        $tenant = Tenant::factory()->create(['name' => $name]);

        $foundTenant = Tenant::where('name', $name)->first();

        static::assertNotNull($foundTenant);
        static::assertSame($tenant->id, $foundTenant->id);
    }

    public function testCanFindTenantBySlug(): void
    {
        $slug = 'unique-tenant-'.uniqid();
        $tenant = Tenant::factory()->create(['slug' => $slug]);

        $foundTenant = Tenant::where('slug', $slug)->first();

        static::assertNotNull($foundTenant);
        static::assertSame($tenant->id, $foundTenant->id);
    }

    public function testCanFindTenantByDomain(): void
    {
        $domain = uniqid().'.uniquetenant.com';
        $tenant = Tenant::factory()->create(['domain' => $domain]);

        $foundTenant = Tenant::where('domain', $domain)->first();

        static::assertNotNull($foundTenant);
        static::assertSame($tenant->id, $foundTenant->id);
    }

    public function testCanFindTenantByDatabase(): void
    {
        $database = 'unique_db_'.uniqid();
        $tenant = Tenant::factory()->create(['database' => $database]);

        $foundTenant = Tenant::where('database', $database)->first();

        static::assertNotNull($foundTenant);
        static::assertSame($tenant->id, $foundTenant->id);
    }

    public function testCanFindActiveTenants(): void
    {
        $marker = 'active-tenant-'.uniqid();

        Tenant::factory()->create(['name' => $marker.'-1', 'is_active' => true]);
        Tenant::factory()->create(['name' => $marker.'-2', 'is_active' => false]);
        Tenant::factory()->create(['name' => $marker.'-3', 'is_active' => true]);

        $activeTenants = Tenant::query()
            ->where('name', 'like', $marker.'%')
            ->where('is_active', true)
            ->get();

        static::assertCount(2, $activeTenants);
        static::assertTrue($activeTenants->every(fn ($tenant) => (bool) $tenant->is_active));
    }

    public function testCanFindTenantsByNamePattern(): void
    {
        $marker = 'company-pattern-'.uniqid();

        Tenant::factory()->create(['name' => $marker.' Development Company']);
        Tenant::factory()->create(['name' => $marker.' Marketing Agency']);
        Tenant::factory()->create(['name' => $marker.' Sales Corporation']);

        $companyTenants = Tenant::where('name', 'like', '%'.$marker.'%Company%')->get();

        static::assertCount(1, $companyTenants);
        static::assertTrue($companyTenants->every(fn ($tenant) => str_contains($tenant->name, 'Company')));
    }

    public function testCanFindTenantsByDomainPattern(): void
    {
        $marker = uniqid();

        Tenant::factory()->create(['domain' => 'dev-'.$marker.'.example.com']);
        Tenant::factory()->create(['domain' => 'staging-'.$marker.'.example.com']);
        Tenant::factory()->create(['domain' => 'prod-'.$marker.'.example.com']);

        $exampleTenants = Tenant::where('domain', 'like', '%'.$marker.'.example.com')->get();

        static::assertCount(3, $exampleTenants);
        static::assertTrue($exampleTenants->every(fn ($tenant) => str_ends_with((string) $tenant->domain, '.example.com')));
    }

    public function testCanUpdateTenant(): void
    {
        $tenant = Tenant::factory()->create(['name' => 'Old Name']);

        $tenant->update(['name' => 'New Name']);

        $this->assertDatabaseHas('tenants', [
            'id' => $tenant->id,
            'name' => 'New Name',
        ]);
    }

    public function testCanHandleNullValues(): void
    {
        $tenant = Tenant::factory()->create([
            'name' => 'Test Tenant',
            'domain' => null,
            'database' => null,
        ]);

        static::assertNull($tenant->domain);
        static::assertNull($tenant->database);
    }

    public function testCanFindTenantsByMultipleCriteria(): void
    {
        $marker = 'multi-criteria-'.uniqid();

        Tenant::factory()->create([
            'name' => $marker.' Active Company',
            'is_active' => true,
            'domain' => $marker.'-active.com',
        ]);

        Tenant::factory()->create([
            'name' => $marker.' Inactive Company',
            'is_active' => false,
            'domain' => $marker.'-inactive.com',
        ]);

        $tenants = Tenant::query()
            ->where('name', 'like', $marker.'%')
            ->where('is_active', true)
            ->where('domain', 'like', '%.com')
            ->get();

        static::assertCount(1, $tenants);
        static::assertSame($marker.' Active Company', $tenants->first()->name);
        static::assertTrue((bool) $tenants->first()->is_active);
    }

    public function testTenantHasUsersRelationship(): void
    {
        $tenant = Tenant::factory()->create();

        static::assertTrue(method_exists($tenant, 'users'));
    }

    public function testTenantHasMembersRelationship(): void
    {
        $tenant = Tenant::factory()->create();

        static::assertTrue(method_exists($tenant, 'members'));
    }

    public function testTenantHasMediaRelationship(): void
    {
        $tenant = Tenant::factory()->create();

        static::assertTrue(method_exists($tenant, 'media'));
    }

    public function testTenantHasFactory(): void
    {
        $tenant = Tenant::factory()->create();

        static::assertNotNull($tenant->id);
        static::assertInstanceOf(Tenant::class, $tenant);
    }

    public function testCanFindTenantsByTrialStatus(): void
    {
        $this->skipUnlessTenantColumn('trial_ends_at');

        $marker = 'trial-status-'.uniqid();

        $activeTenant = Tenant::factory()->create([
            'name' => $marker.' active',
            'trial_ends_at' => now()->addDays(30),
        ]);

        Tenant::factory()->create([
            'name' => $marker.' expired',
            'trial_ends_at' => now()->subDays(1),
        ]);

        $activeTrials = Tenant::query()
            ->where('name', 'like', $marker.'%')
            ->where('trial_ends_at', '>', now())
            ->get();

        static::assertCount(1, $activeTrials);
        static::assertSame($activeTenant->id, $activeTrials->first()->id);
    }

    public function testCanFindTenantsBySettingsValue(): void
    {
        $this->skipUnlessTenantColumn('settings');

        $marker = 'settings-theme-'.uniqid();

        Tenant::factory()->create([
            'name' => $marker.' dark',
            'settings' => ['theme' => 'dark', 'features' => ['chat']],
        ]);

        Tenant::factory()->create([
            'name' => $marker.' light',
            'settings' => ['theme' => 'light', 'features' => ['analytics']],
        ]);

        $darkThemeTenants = Tenant::query()
            ->where('name', 'like', $marker.'%')
            ->whereJsonContains('settings->theme', 'dark')
            ->get();

        static::assertCount(1, $darkThemeTenants);
        static::assertSame('dark', $darkThemeTenants->first()->settings['theme']);
    }
}

<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
use Modules\User\Models\DeviceProfile;
use Modules\User\Models\DeviceUser;
>>>>>>> laraxot/dev
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
it('DeviceUserFactory creates a persistable record without explicit overrides', function (): void {
    Assert::markTestSkipped('Bug noto: DeviceUserFactory::definition() torna [], user_id/device_id NOT NULL falliscono. Vedi Stato attuale in 34-factories-seeders-audit.md.');
});

it('DeviceProfileFactory creates a persistable record without explicit overrides', function (): void {
    Assert::markTestSkipped('Bug noto: model DeviceProfile punta a una tabella inesistente (device_profile). Vedi Stato attuale in 34-factories-seeders-audit.md.');
});
=======
/*
 * Audit prompt 34-factories-seeders-audit.md: verifica che le Factory
 * producano record autonomamente validi.
 *
 * Regressione documentata in bashscripts/docs/prompts/34-factories-seeders-audit.md
 * (sezione "Stato attuale"): `DeviceUserFactory::definition()` e
 * `DeviceProfileFactory::definition()` restituiscono `[]`, quindi non
 * popolano `user_id`/`device_id` (colonne NOT NULL su `device_user`), e il
 * model `DeviceProfile` punta a una tabella (`device_profile`) che non esiste
 * in nessuna migration. Skip finché non esiste una story dedicata: rimuovere
 * `->skip(...)` per riverificare dopo il fix.
 *
 * @covers \Modules\User\Database\Factories\DeviceUserFactory
 * @covers \Modules\User\Database\Factories\DeviceProfileFactory
 */
it('DeviceUserFactory creates a persistable record without explicit overrides', function (): void {
    $deviceUser = DeviceUser::factory()->create();

    Assert::assertTrue($deviceUser->exists);
    Assert::assertNotNull($deviceUser->user_id, 'DeviceUser::definition() is empty: user_id is not autonomously populated.');
    Assert::assertNotNull($deviceUser->device_id, 'DeviceUser::definition() is empty: device_id is not autonomously populated.');
})->skip('Bug noto: DeviceUserFactory::definition() torna [], user_id/device_id NOT NULL falliscono. Vedi Stato attuale in 34-factories-seeders-audit.md.');

it('DeviceProfileFactory creates a persistable record without explicit overrides', function (): void {
    $deviceProfile = DeviceProfile::factory()->create();

    Assert::assertTrue($deviceProfile->exists);
    Assert::assertNotNull($deviceProfile->user_id, 'DeviceProfileFactory::definition() is empty: user_id is not autonomously populated.');
    Assert::assertNotNull($deviceProfile->device_id, 'DeviceProfileFactory::definition() is empty: device_id is not autonomously populated.');
})->skip('Bug noto: model DeviceProfile punta a una tabella inesistente (device_profile). Vedi Stato attuale in 34-factories-seeders-audit.md.');
>>>>>>> laraxot/dev

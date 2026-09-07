<?php

/**
 * --.
 */
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
use Throwable;
=======
>>>>>>> 2024e2e7 (.)
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;

class CreateTenant extends XotBaseCreateRecord
{
    protected static string $resource = TenantResource::class;

    /**
<<<<<<< HEAD
     * @throws Throwable
     */
    protected function handleRecordCreation(array $data): Model
    {
        return parent::handleRecordCreation(collect($data)->except('domain')->toArray());
=======
     * @throws \Throwable
     */
    protected function handleRecordCreation(array $data): Model
    {
        /** @var array<string, mixed> $filteredData */
        $filteredData = collect($data)->except('domain')->toArray();

        return parent::handleRecordCreation($filteredData);
>>>>>>> 2024e2e7 (.)
    }

    // :30    Method Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant::createTenantRecord() is unused.
    //      ✏️  User\Filament\Resources\TenantResource\Pages\CreateTenant.php
    // /**
    //  * @throws \Throwable
    //  */
    // private function createTenantRecord(array $data)
    // {
<<<<<<< HEAD
    //     \Log::info('Saving Tenant');
    //     $record = new Tenant(collect($data)->except('domain')->toArray());
    //     $record->saveOrFail();
    //     \Log::info('Saving Domains');
=======
    //     \Log::debug('Saving Tenant');
    //     $record = new Tenant(collect($data)->except('domain')->toArray());
    //     $record->saveOrFail();
    //     \Log::debug('Saving Domains');
>>>>>>> 2024e2e7 (.)
    //     $record = $record::find($record->);
    //     $record->domains()->create(['domain' => collect($data)->get('domain')]);
    //     return $record;
    // }
}

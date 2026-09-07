<?php

/**
 * --.
 */
<<<<<<< HEAD
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
=======

>>>>>>> f589f9b2 (.)
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Throwable;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;

class CreateTenant extends XotBaseCreateRecord
{
    protected static string $resource = TenantResource::class;

    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @throws Throwable
     */
    protected function handleRecordCreation(array $data): Model
    {
        return parent::handleRecordCreation(collect($data)->except('domain')->toArray());
=======
=======
>>>>>>> f589f9b2 (.)
     * @throws \Throwable
     */
    protected function handleRecordCreation(array $data): Model
    {
        /** @var array<string, mixed> $filteredData */
        $filteredData = collect($data)->except('domain')->toArray();

        return parent::handleRecordCreation($filteredData);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    // :30    Method Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant::createTenantRecord() is unused.
    //      ✏️  User\Filament\Resources\TenantResource\Pages\CreateTenant.php
    // /**
    //  * @throws \Throwable
    //  */
    // private function createTenantRecord(array $data)
    // {
<<<<<<< HEAD
<<<<<<< HEAD
    //     \Log::info('Saving Tenant');
    //     $record = new Tenant(collect($data)->except('domain')->toArray());
    //     $record->saveOrFail();
    //     \Log::info('Saving Domains');
=======
=======
>>>>>>> f589f9b2 (.)
    //     \Log::debug('Saving Tenant');
    //     $record = new Tenant(collect($data)->except('domain')->toArray());
    //     $record->saveOrFail();
    //     \Log::debug('Saving Domains');
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    //     $record = $record::find($record->);
    //     $record->domains()->create(['domain' => collect($data)->get('domain')]);
    //     return $record;
    // }
}

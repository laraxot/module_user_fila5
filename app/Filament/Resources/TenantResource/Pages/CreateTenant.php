<?php

/**
 * --.
 */
<<<<<<< HEAD

=======
>>>>>>> f548be94 (.)
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
=======
use Throwable;
>>>>>>> f548be94 (.)
use Illuminate\Database\Eloquent\Model;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;

class CreateTenant extends XotBaseCreateRecord
{
    protected static string $resource = TenantResource::class;

    /**
<<<<<<< HEAD
     * @throws \Throwable
     */
    protected function handleRecordCreation(array $data): Model
    {
        /** @var array<string, mixed> $filteredData */
        $filteredData = collect($data)->except('domain')->toArray();

        return parent::handleRecordCreation($filteredData);
=======
     * @throws Throwable
     */
    protected function handleRecordCreation(array $data): Model
    {
        return parent::handleRecordCreation(collect($data)->except('domain')->toArray());
>>>>>>> f548be94 (.)
    }

    // :30    Method Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant::createTenantRecord() is unused.
    //      ✏️  User\Filament\Resources\TenantResource\Pages\CreateTenant.php
    // /**
    //  * @throws \Throwable
    //  */
    // private function createTenantRecord(array $data)
    // {
<<<<<<< HEAD
    //     \Log::debug('Saving Tenant');
    //     $record = new Tenant(collect($data)->except('domain')->toArray());
    //     $record->saveOrFail();
    //     \Log::debug('Saving Domains');
=======
    //     \Log::info('Saving Tenant');
    //     $record = new Tenant(collect($data)->except('domain')->toArray());
    //     $record->saveOrFail();
    //     \Log::info('Saving Domains');
>>>>>>> f548be94 (.)
    //     $record = $record::find($record->);
    //     $record->domains()->create(['domain' => collect($data)->get('domain')]);
    //     return $record;
    // }
}

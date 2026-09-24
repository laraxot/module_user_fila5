<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> laraxot/dev
/**
 * --.
 */

<<<<<<< HEAD
namespace Modules\User\Filament\Resources\TenantResource\Pages;

=======
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Illuminate\Database\Eloquent\Model;
>>>>>>> laraxot/dev
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;

class CreateTenant extends XotBaseCreateRecord
{
    protected static string $resource = TenantResource::class;

<<<<<<< HEAD
    /*
     * }
     *
     * // :30    Method Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant::createTenantRecord() is unused.
     * //      ✏️  User\Filament\Resources\TenantResource\Pages\CreateTenant.php
     * // /**
     * //  * @throws \Throwable
     * //  */
    // private function createTenantRecord(array $data)
    // {
=======
    /**
     * @throws \Throwable
     */
    protected function handleRecordCreation(array $data): Model
    {
        /** @var array<string, mixed> $filteredData */
        $filteredData = collect($data)->except('domain')->toArray();

        return parent::handleRecordCreation($filteredData);
    }

    // :30    Method Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant::createTenantRecord() is unused.
    //      ✏️  User\Filament\Resources\TenantResource\Pages\CreateTenant.php
    // /**
    //  * @throws \Throwable
    //  */
    // private function createTenantRecord(array $data)
    // {
    //     \Log::debug('Saving Tenant');
    //     $record = new Tenant(collect($data)->except('domain')->toArray());
    //     $record->saveOrFail();
    //     \Log::debug('Saving Domains');
>>>>>>> laraxot/dev
    //     $record = $record::find($record->);
    //     $record->domains()->create(['domain' => collect($data)->get('domain')]);
    //     return $record;
    // }
}

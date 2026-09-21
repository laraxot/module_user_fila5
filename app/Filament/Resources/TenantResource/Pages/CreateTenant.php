<?php

/**
 * --.
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> bc04202a (fix(user): risolti 746 file con marker di conflitto merge mai puliti in HEAD)
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
=======
    /**
    }

    // :30    Method Modules\User\Filament\Resources\TenantResource\Pages\CreateTenant::createTenantRecord() is unused.
    //      ✏️  User\Filament\Resources\TenantResource\Pages\CreateTenant.php
    // /**
    //  * @throws \Throwable
    //  */
>>>>>>> bc04202a (fix(user): risolti 746 file con marker di conflitto merge mai puliti in HEAD)
    // private function createTenantRecord(array $data)
    // {
    //     $record = $record::find($record->);
    //     $record->domains()->create(['domain' => collect($data)->get('domain')]);
    //     return $record;
    // }
}

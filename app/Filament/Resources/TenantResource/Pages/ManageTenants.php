<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRecords;

class ManageTenants extends XotBaseManageRecords
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
use Filament\Resources\Pages\ManageRecords;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ManageTenants extends ManageRecords
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRecords;

class ManageTenants extends XotBaseManageRecords
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
{
    protected static string $resource = TenantResource::class;
}

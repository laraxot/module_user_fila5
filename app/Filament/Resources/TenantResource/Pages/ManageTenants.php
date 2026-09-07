<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Resources\Pages\ManageRecords;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ManageTenants extends ManageRecords
=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRecords;

class ManageTenants extends XotBaseManageRecords
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
{
    protected static string $resource = TenantResource::class;
}

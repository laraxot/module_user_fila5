<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRecords;

class ManageTenants extends XotBaseManageRecords
=======
use Filament\Resources\Pages\ManageRecords;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ManageTenants extends ManageRecords
>>>>>>> f548be94 (.)
{
    protected static string $resource = TenantResource::class;
}

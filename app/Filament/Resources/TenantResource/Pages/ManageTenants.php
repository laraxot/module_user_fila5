<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
use Filament\Resources\Pages\ManageRecords;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ManageTenants extends ManageRecords
=======
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRecords;

class ManageTenants extends XotBaseManageRecords
>>>>>>> 2024e2e7 (.)
{
    protected static string $resource = TenantResource::class;
}

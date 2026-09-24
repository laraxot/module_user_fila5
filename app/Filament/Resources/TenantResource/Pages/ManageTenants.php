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

class ManageTenants extends ManageRecords
>>>>>>> 350420cb (Check & fix styling)
{
    protected static string $resource = TenantResource::class;
}

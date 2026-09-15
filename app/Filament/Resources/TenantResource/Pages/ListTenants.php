<?php

/**
 * Tenant List Management.
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListTenants extends XotBaseListRecords
{
    protected static string $resource = TenantResource::class;
}

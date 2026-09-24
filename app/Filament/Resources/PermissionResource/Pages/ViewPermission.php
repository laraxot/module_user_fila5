<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

use Modules\User\Filament\Resources\PermissionResource;
<<<<<<< HEAD
use Modules\User\Filament\Resources\PermissionResource\Schemas\PermissionInfolist;
=======
>>>>>>> df2ba808 (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewPermission extends XotBaseViewRecord
{
    protected static string $resource = PermissionResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(PermissionInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
}

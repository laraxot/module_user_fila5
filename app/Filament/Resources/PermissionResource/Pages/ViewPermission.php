<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

use Modules\User\Filament\Resources\PermissionResource;
<<<<<<< .merge_file_DItyqk
<<<<<<< HEAD
use Modules\User\Filament\Resources\PermissionResource\Schemas\PermissionInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_E0TorS
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewPermission extends XotBaseViewRecord
{
    protected static string $resource = PermissionResource::class;
<<<<<<< .merge_file_DItyqk
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
=======
>>>>>>> .merge_file_E0TorS
}

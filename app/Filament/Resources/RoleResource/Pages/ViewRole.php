<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Modules\User\Filament\Resources\RoleResource;
<<<<<<< HEAD
use Modules\User\Filament\Resources\RoleResource\Schemas\RoleInfolist;
=======
>>>>>>> df2ba808 (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewRole extends XotBaseViewRecord
{
    protected static string $resource = RoleResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(RoleInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
}

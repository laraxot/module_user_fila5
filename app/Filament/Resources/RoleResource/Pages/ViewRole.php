<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

use Modules\User\Filament\Resources\RoleResource;
use Modules\User\Filament\Resources\RoleResource\Schemas\RoleInfolist;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewRole extends XotBaseViewRecord
{
    protected static string $resource = RoleResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(RoleInfolist::class)->getInfolistSchema();
    }
}

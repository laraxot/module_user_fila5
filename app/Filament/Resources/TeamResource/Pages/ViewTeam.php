<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

use Modules\User\Filament\Resources\TeamResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\User\Filament\Resources\TeamResource\Schemas\TeamInfolist;

class ViewTeam extends XotBaseViewRecord
{
    // //
    protected static string $resource = TeamResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(TeamInfolist::class)->getInfolistSchema();
    }
}

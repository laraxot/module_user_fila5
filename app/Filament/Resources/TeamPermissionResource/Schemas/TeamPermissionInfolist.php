<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamPermissionResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Support\Htmlable;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class TeamPermissionInfolist extends XotBaseResourceInfolist
{
    /**
<<<<<<< HEAD
     * @return array<string, Component>
=======
     * @return array<string, Component|Htmlable|string>
>>>>>>> laraxot/dev
     *
     * Campi basati sul Model TeamPermission.php -> id, team_id, user_id, permission, name
     */
    public function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'team_id' => TextEntry::make('team_id'),
            'user_id' => TextEntry::make('user_id'),
            'permission' => TextEntry::make('permission'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}

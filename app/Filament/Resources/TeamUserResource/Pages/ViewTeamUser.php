<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamUserResource\Pages;

<<<<<<< HEAD
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
=======
<<<<<<< .merge_file_jhrR1L
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
=======
<<<<<<< HEAD
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> laraxot/dev
>>>>>>> .merge_file_E5MPvQ
>>>>>>> laraxot/dev
use Modules\User\Filament\Resources\TeamUserResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewTeamUser.
 */
class ViewTeamUser extends XotBaseViewRecord
{
    protected static string $resource = TeamUserResource::class;
<<<<<<< HEAD
=======
<<<<<<< .merge_file_jhrR1L
=======
<<<<<<< HEAD
=======
>>>>>>> .merge_file_E5MPvQ
>>>>>>> laraxot/dev

    /**
     * @return array<string, Component>
     */
    public function getInfolistSchema(): array
    {
        return [
            'team_user' => Section::make()->schema([
                'id' => TextEntry::make('id'),
                'team_name' => TextEntry::make('team.name'),
                'user_name' => TextEntry::make('user.name'),
                'role' => TextEntry::make('role'),
                'created_at' => TextEntry::make('created_at')->dateTime(),
                'updated_at' => TextEntry::make('updated_at')->dateTime(),
            ]),
        ];
    }
<<<<<<< HEAD
=======
<<<<<<< .merge_file_jhrR1L
=======
>>>>>>> laraxot/dev
>>>>>>> .merge_file_E5MPvQ
>>>>>>> laraxot/dev
}

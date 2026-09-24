<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamUserResource\Pages;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
<<<<<<< HEAD
use Modules\User\Filament\Resources\TeamUserResource;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewTeamUser.
 */
class ViewTeamUser extends XotBaseViewRecord
{
<<<<<<< HEAD
    protected static string $resource = TeamUserResource::class;
=======
    protected static string $resource = \Modules\User\Filament\Resources\TeamUserResource::class;
>>>>>>> 350420cb (Check & fix styling)

    /**
     * @return array<string, Component>
     */
<<<<<<< HEAD
    public function getInfolistSchema(): array
=======
    #[\Override]
    protected function getInfolistSchema(): array
>>>>>>> 350420cb (Check & fix styling)
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
}

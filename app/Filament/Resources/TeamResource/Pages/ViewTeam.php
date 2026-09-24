<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\TeamResource;
use Modules\User\Filament\Resources\TeamResource\Schemas\TeamInfolist;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\TeamResource;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewTeam extends XotBaseViewRecord
{
    // //
    protected static string $resource = TeamResource::class;

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(TeamInfolist::class)->getInfolistSchema();
=======
     * @return array<string, Component>
     */
    #[\Override]
    public function getInfolistSchema(): array
    {
        return [
            'team_info' => Section::make()->schema([
                'id' => TextEntry::make('id'),
                'name' => TextEntry::make('name'),
                'display_name' => TextEntry::make('display_name'),
                'description' => TextEntry::make('description'),
                'created_at' => TextEntry::make('created_at'),
                'updated_at' => TextEntry::make('updated_at'),
            ]),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
}

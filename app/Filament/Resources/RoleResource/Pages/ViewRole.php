<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\RoleResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\RoleResource;
<<<<<<< .merge_file_d2OcGW
use Modules\User\Filament\Resources\RoleResource\Schemas\RoleInfolist;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\RoleResource;
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_drGxoQ
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewRole extends XotBaseViewRecord
{
    protected static string $resource = RoleResource::class;
<<<<<<< .merge_file_d2OcGW

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> 350420cb (Check & fix styling)
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
<<<<<<< HEAD
        return app(RoleInfolist::class)->getInfolistSchema();
=======
        return [
            'role_info' => Section::make()->schema([
                'id' => TextEntry::make('id'),
                'name' => TextEntry::make('name'),
                'guard_name' => TextEntry::make('guard_name'),
                'team_id' => TextEntry::make('team_id'),
                'uuid' => TextEntry::make('uuid'),
                'created_at' => TextEntry::make('created_at'),
                'updated_at' => TextEntry::make('updated_at'),
            ]),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
=======
>>>>>>> .merge_file_drGxoQ
}

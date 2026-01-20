<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

<<<<<<< HEAD
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Modules\User\Filament\Resources\TeamResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
=======
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Modules\User\Filament\Resources\TeamResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> f548be94 (.)

class EditTeam extends XotBaseEditRecord
{
    // //
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            'view' => ViewAction::make(),
            'delete' => DeleteAction::make(),
=======
            ViewAction::make(),
            DeleteAction::make(),
>>>>>>> f548be94 (.)
        ];
    }
}

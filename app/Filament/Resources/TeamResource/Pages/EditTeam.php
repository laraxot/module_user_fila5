<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Modules\User\Filament\Resources\TeamResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Modules\User\Filament\Resources\TeamResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

class EditTeam extends XotBaseEditRecord
{
    // //
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
            ViewAction::make(),
            DeleteAction::make(),
=======
            'view' => ViewAction::make(),
            'delete' => DeleteAction::make(),
>>>>>>> 2024e2e7 (.)
=======
            'view' => ViewAction::make(),
            'delete' => DeleteAction::make(),
>>>>>>> f589f9b2 (.)
        ];
    }
}

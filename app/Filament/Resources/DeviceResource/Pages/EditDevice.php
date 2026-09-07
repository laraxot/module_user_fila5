<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\DeviceResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\DeleteAction;
use Modules\User\Filament\Resources\DeviceResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
use Filament\Actions\DeleteAction;
use Modules\User\Filament\Resources\DeviceResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
>>>>>>> 2024e2e7 (.)

class EditDevice extends XotBaseEditRecord
{
    protected static string $resource = DeviceResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            DeleteAction::make(),
=======
            'delete' => DeleteAction::make(),
>>>>>>> 2024e2e7 (.)
        ];
    }
}

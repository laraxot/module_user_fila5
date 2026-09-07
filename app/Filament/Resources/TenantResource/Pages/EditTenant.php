<?php

/**
 * --.
 */
<<<<<<< HEAD
=======

>>>>>>> 2024e2e7 (.)
declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantResource\Pages;

<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Filament\Actions\ViewAction;
use Filament\Actions\DeleteAction;
use Filament\Actions;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
>>>>>>> 2024e2e7 (.)

class EditTenant extends XotBaseEditRecord
{
    protected static string $resource = TenantResource::class;

    protected function getHeaderActions(): array
    {
        return [
<<<<<<< HEAD
            ViewAction::make(),
            DeleteAction::make(),
=======
            'view' => ViewAction::make(),
            'delete' => DeleteAction::make(),
>>>>>>> 2024e2e7 (.)
        ];
    }
}

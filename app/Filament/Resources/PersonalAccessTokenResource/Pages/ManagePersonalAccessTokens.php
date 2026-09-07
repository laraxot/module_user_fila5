<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PersonalAccessTokenResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\CreateAction;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Resources\Pages\ManageRecords;
use Modules\User\Filament\Resources\PersonalAccessTokenResource;

final class ManagePersonalAccessTokens extends ManageRecords
=======
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Filament\Resources\PersonalAccessTokenResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseManageRecords;

final class ManagePersonalAccessTokens extends XotBaseManageRecords
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
{
    protected static string $resource = PersonalAccessTokenResource::class;

    /**
     * Get the header actions.
     *
     * @return array<string, Action|ActionGroup>
     */
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }
}

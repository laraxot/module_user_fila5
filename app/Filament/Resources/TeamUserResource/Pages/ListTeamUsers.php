<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamUserResource\Pages;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Filament\Resources\TeamUserResource;
=======
>>>>>>> 60a2c9a9 (.)
=======
=======
use Modules\User\Filament\Resources\TeamUserResource;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
use Modules\User\Filament\Resources\TeamUserResource;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

/**
 * Class ListTeamUsers.
 */
class ListTeamUsers extends XotBaseListRecords
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static string $resource = TeamUserResource::class;
=======
    protected static string $resource = \Modules\User\Filament\Resources\TeamUserResource::class;
>>>>>>> 60a2c9a9 (.)
=======
    protected static string $resource = \Modules\User\Filament\Resources\TeamUserResource::class;
=======
    protected static string $resource = TeamUserResource::class;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    protected static string $resource = TeamUserResource::class;
>>>>>>> laraxot/dev

    /**
     * @return array<string, Action>
     */
    #[\Override]
    protected function getHeaderActions(): array
    {
        return [
            'create' => CreateAction::make(),
        ];
    }
}

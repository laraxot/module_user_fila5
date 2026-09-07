<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
use Override;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Modules\User\Filament\Resources\TeamResource\Pages\CreateTeam;
use Modules\User\Filament\Resources\TeamResource\Pages\EditTeam;
use Modules\User\Filament\Resources\TeamResource\Pages\ListTeams;
use Modules\User\Filament\Resources\TeamResource\Pages\ViewTeam;
use Modules\User\Filament\Resources\TeamResource\RelationManagers\UsersRelationManager;
=======
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 2024e2e7 (.)
=======
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
>>>>>>> f589f9b2 (.)
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Resources\XotBaseResource;

class TeamResource extends XotBaseResource
{
    /**
     * Get the model class name for this resource.
     *
     * @return class-string<Model>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
=======
    #[\Override]
>>>>>>> f589f9b2 (.)
    public static function getModel(): string
    {
        $xot = XotData::make();

<<<<<<< HEAD
<<<<<<< HEAD
        /** @var class-string<Model> */
        return $xot->getTeamClass();
    }

    #[Override]
=======
        /* @var class-string<Model> */
        return $xot->getTeamClass();
    }

    #[\Override]
>>>>>>> f589f9b2 (.)
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'display_name' => TextInput::make('display_name')->maxLength(255),
            'description' => TextInput::make('description')->maxLength(255),
        ];
    }
<<<<<<< HEAD
=======
        /* @var class-string<Model> */
        return $xot->getTeamClass();
    }

    

>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}

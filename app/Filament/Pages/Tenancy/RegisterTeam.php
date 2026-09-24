<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Pages\Tenancy\XotBaseRegisterTenant;

class RegisterTeam extends XotBaseRegisterTenant
=======
use Filament\Pages\Tenancy\RegisterTenant;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Datas\XotData;

class RegisterTeam extends RegisterTenant
>>>>>>> 350420cb (Check & fix styling)
{
    public static function getLabel(): string
    {
        return 'Register team';
    }

<<<<<<< HEAD
    /**
     * @return array<int, TextInput>
     */
=======
    /** @return array<int|string, mixed> */
>>>>>>> 350420cb (Check & fix styling)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            // ...
        ];
    }

    /**
     * @param array<string, mixed> $data
     */
    protected function handleRegistration(array $data): Model
    {
        $teamClass = XotData::make()->getTeamClass();
        /** @var Model&TeamContract */
        $team = $teamClass::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}

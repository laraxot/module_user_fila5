<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Schemas\Schema;
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use Modules\User\Contracts\TeamContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Pages\Tenancy\XotBaseRegisterTenant;

class RegisterTeam extends XotBaseRegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register team';
    }

<<<<<<< HEAD
    public function form(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema());
    }

=======
>>>>>>> laraxot/dev
    /**
     * @return array<int, TextInput>
     */
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            // ...
        ];
    }

    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $data
=======
     * @param array<string, mixed> $data
>>>>>>> laraxot/dev
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

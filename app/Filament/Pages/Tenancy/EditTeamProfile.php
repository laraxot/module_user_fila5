<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Modules\Xot\Filament\Pages\Tenancy\XotBaseEditTenantProfile;

class EditTeamProfile extends XotBaseEditTenantProfile
=======
use Filament\Schemas\Schema;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTeamProfile extends EditTenantProfile
>>>>>>> f548be94 (.)
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

<<<<<<< HEAD
    /**
     * @return array<int, TextInput>
     */
=======
>>>>>>> f548be94 (.)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            // ...
        ];
    }
}

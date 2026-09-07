<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
<<<<<<< HEAD
use Filament\Schemas\Schema;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTeamProfile extends EditTenantProfile
=======
use Modules\Xot\Filament\Pages\Tenancy\XotBaseEditTenantProfile;

class EditTeamProfile extends XotBaseEditTenantProfile
>>>>>>> 2024e2e7 (.)
=======
use Modules\Xot\Filament\Pages\Tenancy\XotBaseEditTenantProfile;

class EditTeamProfile extends XotBaseEditTenantProfile
>>>>>>> f589f9b2 (.)
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @return array<int, TextInput>
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @return array<int, TextInput>
     */
>>>>>>> f589f9b2 (.)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            // ...
        ];
    }
}

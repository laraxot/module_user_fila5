<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Schemas\Schema;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTeamProfile extends EditTenantProfile
=======
use Modules\Xot\Filament\Pages\Tenancy\XotBaseEditTenantProfile;

class EditTeamProfile extends XotBaseEditTenantProfile
>>>>>>> 2024e2e7 (.)
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

<<<<<<< HEAD
=======
    /**
     * @return array<int, TextInput>
     */
>>>>>>> 2024e2e7 (.)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            // ...
        ];
    }
}

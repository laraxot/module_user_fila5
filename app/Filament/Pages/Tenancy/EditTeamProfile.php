<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Modules\Xot\Filament\Pages\Tenancy\XotBaseEditTenantProfile;

class EditTeamProfile extends XotBaseEditTenantProfile
=======
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTeamProfile extends EditTenantProfile
>>>>>>> 350420cb (Check & fix styling)
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
    /** @return array<int|string, mixed> */
>>>>>>> 350420cb (Check & fix styling)
    public function getFormSchema(): array
    {
        return [
            TextInput::make('name'),
            // ...
        ];
    }
}

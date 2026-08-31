<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
use Filament\Schemas\Schema;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Pages\Tenancy\XotBaseEditTenantProfile;

class EditTeamProfile extends XotBaseEditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Team profile';
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
}

<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Tenancy;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Modules\Xot\Filament\Pages\Tenancy\XotBaseEditTenantProfile;

class EditTeamProfile extends XotBaseEditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Team profile';
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components($this->getFormSchema());
    }

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

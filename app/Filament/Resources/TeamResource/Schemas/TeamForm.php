<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component as SchemaComponent;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class TeamForm extends XotBaseResourceForm
{
    /**
     * @return array<int|string, SchemaComponent>
     */
<<<<<<< HEAD
    public function getFormSchema(): array
=======
    public static function getFormSchema(): array
>>>>>>> f589f9b2 (.)
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'display_name' => TextInput::make('display_name')->maxLength(255),
            'description' => TextInput::make('description')->maxLength(255),
        ];
    }
}

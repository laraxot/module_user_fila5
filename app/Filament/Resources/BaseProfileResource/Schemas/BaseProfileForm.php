<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class BaseProfileForm extends XotBaseResourceForm
{
    /**
     * @return array<int|string, Component>
     */
<<<<<<< HEAD
    public function getFormSchema(): array
=======
    public static function getFormSchema(): array
>>>>>>> f589f9b2 (.)
    {
        return [
            Section::make([
                'name' => TextInput::make('name'),
            ]),
        ];
    }
}

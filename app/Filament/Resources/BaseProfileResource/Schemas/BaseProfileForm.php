<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Schemas;

<<<<<<< HEAD
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;

class BaseProfileForm extends XotBaseResourceForm
{
<<<<<<< HEAD
    #[\Override]
    public function getFormSchema(): array
    {
        return [
            // Forms\Components\TextInput::make('user_id'),
            // Forms\Components\TextInput::make('user_id')->readonly(),
            'user_name' => TextInput::make('user.name'),
            'email' => TextInput::make('email'),
            'first_name' => TextInput::make('first_name'),
            'last_name' => TextInput::make('last_name'),
            'photo_profile' => SpatieMediaLibraryFileUpload::make('photo_profile')
                // ->image()
                // ->maxSize(5000)
                // ->multiple()
                // ->enableReordering()
                ->openable()
                ->downloadable()
                ->columnSpanFull()
                // ->collection('avatars')
                // ->conversion('thumbnail')
                ->disk('uploads')
                ->directory('photos')
                ->collection('photo_profile'),
=======
    /**
     * @return array<int|string, Component>
     */
    public static function getFormSchema(): array
    {
        return [
            Section::make([
                'name' => TextInput::make('name'),
            ]),
>>>>>>> 350420cb (Check & fix styling)
        ];
    }
}

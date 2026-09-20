<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Filament\Forms\Components\TextInput;
=======
>>>>>>> laraxot/dev
use Filament\Schemas\Components\Component;
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Filament\Resources\XotBaseResource;

final class PersonalAccessTokenResource extends XotBaseResource
{
    protected static ?string $model = OauthAccessToken::class;

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<string, Component>
     */
    #[\Override]
<<<<<<< HEAD
<<<<<<< HEAD
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
        ];
    }
=======
>>>>>>> 2024e2e7 (.)

=======
>>>>>>> laraxot/dev
    public static function getPages(): array
    {
        return [];
    }
}

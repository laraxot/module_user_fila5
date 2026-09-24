<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
use Modules\User\Models\OauthAccessToken;
=======
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Modules\User\Models\OauthToken;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\XotBaseResource;

final class PersonalAccessTokenResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static ?string $model = OauthAccessToken::class;
=======
    protected static ?string $model = OauthToken::class;
>>>>>>> 350420cb (Check & fix styling)

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<string, Component>
     */
    #[\Override]
<<<<<<< HEAD
=======
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
        ];
    }

>>>>>>> 350420cb (Check & fix styling)
    public static function getPages(): array
    {
        return [];
    }
}

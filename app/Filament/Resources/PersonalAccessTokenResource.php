<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\TextInput;
<<<<<<< HEAD
=======
use Filament\Schemas\Components\Component;
>>>>>>> laraxot/dev
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Filament\Resources\XotBaseResource;

final class PersonalAccessTokenResource extends XotBaseResource
{
    protected static ?string $model = OauthAccessToken::class;

    protected static ?string $recordTitleAttribute = 'name';

    /**
<<<<<<< HEAD
     * @return array<string, mixed>
     */
    // #[\Override]
    public static function getFormSchemaOld(): array
=======
     * @return array<string, Component>
     */
    #[\Override]
    public static function getFormSchema(): array
>>>>>>> laraxot/dev
    {
        return [
            'name' => TextInput::make('name')
                ->required()
                ->maxLength(255),
        ];
    }

    public static function getPages(): array
    {
        return [];
    }
}

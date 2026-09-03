<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Filament\Resources\XotBaseResource;

final class PersonalAccessTokenResource extends XotBaseResource
{
    protected static ?string $model = OauthAccessToken::class;

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * Schema legacy del form: la sorgente di verità è PersonalAccessTokenForm::getFormSchema().
     *
     * @return array<string, Component>
     */
    public static function getFormSchemaOld(): array
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

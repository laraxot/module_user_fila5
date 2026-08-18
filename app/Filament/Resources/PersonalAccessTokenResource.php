<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Modules\User\Models\OauthAccessToken;
use Modules\Xot\Filament\Resources\XotBaseResource;

<<<<<<< .merge_file_ZB87Zg
use Filament\Forms\Components\Field;
=======
>>>>>>> .merge_file_4yKE8E
final class PersonalAccessTokenResource extends XotBaseResource
{
    protected static ?string $model = OauthAccessToken::class;

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * @return array<string, mixed>
     */
<<<<<<< .merge_file_ZB87Zg
    //#[\Override]
=======
    // #[\Override]
>>>>>>> .merge_file_4yKE8E
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

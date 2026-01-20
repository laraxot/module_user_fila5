<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
=======
use Override;
>>>>>>> f548be94 (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\User\Filament\Resources\FeatureResource\Pages\CreateFeature;
use Modules\User\Filament\Resources\FeatureResource\Pages\EditFeature;
use Modules\User\Filament\Resources\FeatureResource\Pages\ListFeatures;
use Modules\User\Models\Feature;
<<<<<<< HEAD
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> f548be94 (.)
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * @property Feature $record
 */
class FeatureResource extends XotBaseResource
{
<<<<<<< HEAD
    protected static ?string $model = Feature::class;

    #[\Override]
=======
    protected static null|string $model = Feature::class;

    #[Override]
>>>>>>> f548be94 (.)
    public static function getFormSchema(): array
    {
        return [
            'name' => TextInput::make('name')->required()->maxLength(255),
            'type' => TextInput::make('type')->required()->maxLength(255),
            'active' => Toggle::make('active')->required(),
        ];
    }

<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> f548be94 (.)
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> f548be94 (.)
    public static function getPages(): array
    {
        return [
            'index' => ListFeatures::route('/'),
            'create' => CreateFeature::route('/create'),
            'edit' => EditFeature::route('/{record}/edit'),
        ];
    }
}

<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Override;
>>>>>>> f548be94 (.)
=======
use Override;
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
=======
>>>>>>> laraxot/dev
use Modules\User\Filament\Resources\FeatureResource\Pages\CreateFeature;
use Modules\User\Filament\Resources\FeatureResource\Pages\EditFeature;
use Modules\User\Filament\Resources\FeatureResource\Pages\ListFeatures;
use Modules\User\Models\Feature;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
>>>>>>> f548be94 (.)
=======
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\XotBaseResource;

/**
 * @property Feature $record
 */
class FeatureResource extends XotBaseResource
{
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    protected static ?string $model = Feature::class;

    #[\Override]
=======
=======
>>>>>>> 87273113 (.)
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
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
    protected static ?string $model = Feature::class;

    #[\Override]
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    protected static ?string $model = Feature::class;

    #[\Override]
>>>>>>> laraxot/dev
    public static function getRelations(): array
    {
        return [];
    }

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    #[\Override]
=======
    #[Override]
>>>>>>> f548be94 (.)
=======
    #[Override]
=======
    #[\Override]
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
    #[\Override]
>>>>>>> laraxot/dev
    public static function getPages(): array
    {
        return [
            'index' => ListFeatures::route('/'),
            'create' => CreateFeature::route('/create'),
            'edit' => EditFeature::route('/{record}/edit'),
        ];
    }
}

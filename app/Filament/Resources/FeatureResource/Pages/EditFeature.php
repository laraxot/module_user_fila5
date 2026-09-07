<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\FeatureResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
use Modules\User\Filament\Resources\FeatureResource;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
=======
use Modules\User\Filament\Resources\FeatureResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
>>>>>>> 2024e2e7 (.)
=======
use Modules\User\Filament\Resources\FeatureResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseEditRecord;
>>>>>>> f589f9b2 (.)

class EditFeature extends XotBaseEditRecord
{
    protected static string $resource = FeatureResource::class;
}

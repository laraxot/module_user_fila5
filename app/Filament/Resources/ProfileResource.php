<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources;

use Modules\User\Models\Profile;
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;

class ProfileResource extends BaseProfileResource
{
    protected static null|string $model = Profile::class;
=======

class ProfileResource extends BaseProfileResource
{
    protected static ?string $model = Profile::class;
>>>>>>> 2024e2e7 (.)
}

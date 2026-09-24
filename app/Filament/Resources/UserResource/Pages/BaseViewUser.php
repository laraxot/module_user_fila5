<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Modules\User\Filament\Resources\UserResource;
<<<<<<< .merge_file_2VLKiJ
<<<<<<< HEAD
use Modules\User\Filament\Resources\UserResource\Schemas\UserInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_kMGm7J
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Base class for viewing user resources.
 *
 * This class provides the base configuration for viewing user resources
 * across the application. It should be extended by specific user type
 * view classes rather than used directly.
 */
abstract class BaseViewUser extends XotBaseViewRecord
{
    protected static string $resource = UserResource::class;
<<<<<<< .merge_file_2VLKiJ
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(UserInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_kMGm7J
}

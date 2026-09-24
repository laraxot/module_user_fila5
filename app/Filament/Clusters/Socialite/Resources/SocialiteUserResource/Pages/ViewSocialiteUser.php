<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SocialiteUserResource\Pages;

use Modules\User\Filament\Clusters\Socialite\Resources\SocialiteUserResource;
<<<<<<< .merge_file_72TC8t
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Socialite\Resources\SocialiteUserResource\Schemas\SocialiteUserInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_FXE4Ev
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSocialiteUser extends XotBaseViewRecord
{
    protected static string $resource = SocialiteUserResource::class;
<<<<<<< .merge_file_72TC8t
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(SocialiteUserInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_FXE4Ev
}

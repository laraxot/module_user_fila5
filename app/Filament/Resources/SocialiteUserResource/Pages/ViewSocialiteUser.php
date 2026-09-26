<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Pages;

use Modules\User\Filament\Resources\SocialiteUserResource;
<<<<<<< HEAD
use Modules\User\Filament\Resources\SocialiteUserResource\Schemas\SocialiteUserInfolist;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSocialiteUser extends XotBaseViewRecord
{
    protected static string $resource = SocialiteUserResource::class;
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
>>>>>>> laraxot/dev
}

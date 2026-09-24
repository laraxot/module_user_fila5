<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SocialiteUserResource\Pages;

use Modules\User\Filament\Clusters\Socialite\Resources\SocialiteUserResource;
use Modules\User\Filament\Clusters\Socialite\Resources\SocialiteUserResource\Schemas\SocialiteUserInfolist;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSocialiteUser extends XotBaseViewRecord
{
    protected static string $resource = SocialiteUserResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(SocialiteUserInfolist::class)->getInfolistSchema();
    }
}

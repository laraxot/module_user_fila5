<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SocialProviderResource\Pages;

use Modules\User\Filament\Clusters\Socialite\Resources\SocialProviderResource;
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Socialite\Resources\SocialProviderResource\Schemas\SocialProviderInfolist;
=======
>>>>>>> df2ba808 (.)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSocialProvider extends XotBaseViewRecord
{
    protected static string $resource = SocialProviderResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(SocialProviderInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
}

<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SocialProviderResource\Pages;

use Modules\User\Filament\Clusters\Socialite\Resources\SocialProviderResource;
<<<<<<< .merge_file_8LI2GP
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Socialite\Resources\SocialProviderResource\Schemas\SocialProviderInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_v3etkw
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSocialProvider extends XotBaseViewRecord
{
    protected static string $resource = SocialProviderResource::class;
<<<<<<< .merge_file_8LI2GP
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
=======
>>>>>>> .merge_file_v3etkw
}

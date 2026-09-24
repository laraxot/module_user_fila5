<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Pages;

use Modules\User\Filament\Resources\SocialProviderResource;
<<<<<<< .merge_file_uP7ACx
<<<<<<< HEAD
use Modules\User\Filament\Resources\SocialProviderResource\Schemas\SocialProviderInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_tXpQ0Z
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSocialProvider extends XotBaseViewRecord
{
    protected static string $resource = SocialProviderResource::class;
<<<<<<< .merge_file_uP7ACx
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
>>>>>>> .merge_file_tXpQ0Z
}

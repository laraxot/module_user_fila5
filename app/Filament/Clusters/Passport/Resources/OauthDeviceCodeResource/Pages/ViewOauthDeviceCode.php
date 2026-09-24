<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource;
<<<<<<< .merge_file_rdB7Lr
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource\Schemas\OauthDeviceCodeInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_DYYUUK
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthDeviceCode extends XotBaseViewRecord
{
    protected static string $resource = OauthDeviceCodeResource::class;
<<<<<<< .merge_file_rdB7Lr
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthDeviceCodeInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_DYYUUK
}

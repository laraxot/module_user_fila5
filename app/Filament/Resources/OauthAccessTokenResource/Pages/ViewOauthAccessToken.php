<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthAccessTokenResource\Pages;

use Modules\User\Filament\Resources\OauthAccessTokenResource;
<<<<<<< .merge_file_yD9Ert
<<<<<<< HEAD
use Modules\User\Filament\Resources\OauthAccessTokenResource\Schemas\OauthAccessTokenInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_Z4E1fa
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthAccessToken extends XotBaseViewRecord
{
    protected static string $resource = OauthAccessTokenResource::class;
<<<<<<< .merge_file_yD9Ert
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthAccessTokenInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_Z4E1fa
}

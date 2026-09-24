<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource;
<<<<<<< .merge_file_Z5IVoa
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Schemas\OauthRefreshTokenInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_h17aRj
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthRefreshToken extends XotBaseViewRecord
{
    protected static string $resource = OauthRefreshTokenResource::class;
<<<<<<< .merge_file_Z5IVoa
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthRefreshTokenInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_h17aRj
}

<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource;
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Schemas\OauthRefreshTokenInfolist;
=======
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthRefreshToken extends XotBaseViewRecord
{
    protected static string $resource = OauthRefreshTokenResource::class;
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
>>>>>>> laraxot/dev
}

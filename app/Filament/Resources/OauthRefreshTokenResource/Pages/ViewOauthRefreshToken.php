<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthRefreshTokenResource\Pages;

use Modules\User\Filament\Resources\OauthRefreshTokenResource;
<<<<<<< .merge_file_Px1djo
<<<<<<< HEAD
use Modules\User\Filament\Resources\OauthRefreshTokenResource\Schemas\OauthRefreshTokenInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_N3iBUm
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthRefreshToken extends XotBaseViewRecord
{
    protected static string $resource = OauthRefreshTokenResource::class;
<<<<<<< .merge_file_Px1djo
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
>>>>>>> .merge_file_N3iBUm
}

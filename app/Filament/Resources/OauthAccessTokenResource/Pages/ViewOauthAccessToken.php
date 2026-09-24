<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthAccessTokenResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\OauthAccessTokenResource;
<<<<<<< .merge_file_uwvNlQ
use Modules\User\Filament\Resources\OauthAccessTokenResource\Schemas\OauthAccessTokenInfolist;
=======
use Filament\Schemas\Components\Component;
use Modules\User\Filament\Resources\OauthAccessTokenResource;
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_BACV29
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthAccessToken extends XotBaseViewRecord
{
    protected static string $resource = OauthAccessTokenResource::class;
<<<<<<< .merge_file_uwvNlQ

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> 350420cb (Check & fix styling)
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
<<<<<<< HEAD
        return app(OauthAccessTokenInfolist::class)->getInfolistSchema();
=======
        return [];
>>>>>>> 350420cb (Check & fix styling)
    }
=======
>>>>>>> .merge_file_BACV29
}

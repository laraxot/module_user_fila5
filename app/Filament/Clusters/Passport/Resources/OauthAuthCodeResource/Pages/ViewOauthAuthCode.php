<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthAuthCodeResource\Pages;

use Modules\User\Filament\Clusters\Passport\Resources\OauthAuthCodeResource;
<<<<<<< .merge_file_qtU9kw
<<<<<<< HEAD
use Modules\User\Filament\Clusters\Passport\Resources\OauthAuthCodeResource\Schemas\OauthAuthCodeInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_Mcj9XY
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewOauthAuthCode extends XotBaseViewRecord
{
    protected static string $resource = OauthAuthCodeResource::class;
<<<<<<< .merge_file_qtU9kw
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthAuthCodeInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_Mcj9XY
}

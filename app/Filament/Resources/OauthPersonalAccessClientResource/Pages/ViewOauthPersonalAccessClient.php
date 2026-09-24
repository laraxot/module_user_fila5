<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthPersonalAccessClientResource\Pages;

use Modules\User\Filament\Resources\OauthPersonalAccessClientResource;
<<<<<<< .merge_file_xoFAGB
<<<<<<< HEAD
use Modules\User\Filament\Resources\OauthPersonalAccessClientResource\Schemas\OauthPersonalAccessClientInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_oCISCN
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewOauthPersonalAccessClient.
 */
class ViewOauthPersonalAccessClient extends XotBaseViewRecord
{
    protected static string $resource = OauthPersonalAccessClientResource::class;
<<<<<<< .merge_file_xoFAGB
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(OauthPersonalAccessClientInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_oCISCN
}

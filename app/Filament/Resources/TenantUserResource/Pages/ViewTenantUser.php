<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TenantUserResource\Pages;

use Modules\User\Filament\Resources\TenantUserResource;
<<<<<<< .merge_file_RStbso
<<<<<<< HEAD
use Modules\User\Filament\Resources\TenantUserResource\Schemas\TenantUserInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_fK4HH1
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewTenantUser.
 */
class ViewTenantUser extends XotBaseViewRecord
{
    protected static string $resource = TenantUserResource::class;
<<<<<<< .merge_file_RStbso
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(TenantUserInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_fK4HH1
}

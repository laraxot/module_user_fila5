<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Pages;

use Modules\User\Filament\Resources\BaseProfileResource;
<<<<<<< .merge_file_ituVqr
<<<<<<< HEAD
use Modules\User\Filament\Resources\BaseProfileResource\Schemas\BaseProfileInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_nywMF7
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewProfile extends XotBaseViewRecord
{
    protected static string $resource = BaseProfileResource::class;
<<<<<<< .merge_file_ituVqr
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(BaseProfileInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_nywMF7
}

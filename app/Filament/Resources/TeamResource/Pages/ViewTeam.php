<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\TeamResource\Pages;

use Modules\User\Filament\Resources\TeamResource;
<<<<<<< .merge_file_Dy0EXG
<<<<<<< HEAD
use Modules\User\Filament\Resources\TeamResource\Schemas\TeamInfolist;
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_20aXZl
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewTeam extends XotBaseViewRecord
{
    // //
    protected static string $resource = TeamResource::class;
<<<<<<< .merge_file_Dy0EXG
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(TeamInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_20aXZl
}

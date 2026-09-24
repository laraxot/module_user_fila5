<?php

declare(strict_types=1);
/**
 * --.
 */

namespace Modules\User\Filament\Resources\TenantResource\Pages;

use Modules\User\Filament\Resources\TenantResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewTenant extends XotBaseViewRecord
{
    protected static string $resource = TenantResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [];
    }
=======
>>>>>>> df2ba808 (.)
}

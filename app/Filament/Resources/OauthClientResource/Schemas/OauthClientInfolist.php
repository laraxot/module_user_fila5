<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthClientResource\Schemas;

use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class OauthClientInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<int|string, Component|Htmlable|string>
     */
    public static function getInfolistSchema(): array
    {
        return [];
    }
}

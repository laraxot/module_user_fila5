<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Schemas;

use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class SocialiteUserInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<int|string, Component|Htmlable|string>
     */
    public static function getInfolistSchema(): array
    {
        return [];
    }
}

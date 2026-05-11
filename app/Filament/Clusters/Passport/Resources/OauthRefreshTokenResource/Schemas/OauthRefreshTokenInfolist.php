<?php

declare(strict_types=1);

namespace Modules\base_quaeris_fila5\var\www\_bases\base_quaeris_fila5\laravel\Modules\User\app\Filament\Clusters\Passport\Resources\OauthRefreshTokenResource\Schemas;

use Filament\Infolists\Components\TextEntry;

class OauthRefreshTokenInfolist
{
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
        ];
    }
}

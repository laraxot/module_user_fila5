<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Passport\Resources\OauthDeviceCodeResource\Schemas;

use Filament\Infolists\Components\TextEntry;

class OauthDeviceCodeInfolist
{
    /**
     * @return array<string, TextEntry>
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public static function getInfolistSchema(): array
=======
    public function getInfolistSchema(): array
>>>>>>> 87273113 (.)
=======
    public function getInfolistSchema(): array
>>>>>>> laraxot/dev
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
        ];
    }
}

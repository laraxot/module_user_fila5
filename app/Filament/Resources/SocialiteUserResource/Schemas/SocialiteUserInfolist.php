<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialiteUserResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class SocialiteUserInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     *
     * Campi basati sul Model SocialiteUser.php -> id, uuid, user_id, provider, provider_id, token, name, email, avatar
     */
<<<<<<< HEAD
    public function getInfolistSchema(): array
=======
    public static function getInfolistSchema(): array
>>>>>>> f589f9b2 (.)
    {
        return [
            'id' => TextEntry::make('id'),
            'uuid' => TextEntry::make('uuid'),
            'user_id' => TextEntry::make('user_id'),
            'provider' => TextEntry::make('provider'),
            'provider_id' => TextEntry::make('provider_id'),
            'name' => TextEntry::make('name'),
<<<<<<< HEAD
            'email' => TextEntry::make('email'),
            'avatar' => TextEntry::make('avatar'),
=======
            'email' => TextEntry::make('email')
                ->copyable(),
            'avatar' => TextEntry::make('avatar'),
            'token' => TextEntry::make('token')
                ->copyable(),
>>>>>>> f589f9b2 (.)
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}

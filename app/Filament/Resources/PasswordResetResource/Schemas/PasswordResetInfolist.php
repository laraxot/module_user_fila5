<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PasswordResetResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class PasswordResetInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     *
     * Campi basati sul Model PasswordReset.php -> id, uuid, email, token, user_id
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
<<<<<<< HEAD
            'email' => TextEntry::make('email'),
=======
            'email' => TextEntry::make('email')
                ->copyable(),
            'token' => TextEntry::make('token')
                ->copyable(),
>>>>>>> f589f9b2 (.)
            'user_id' => TextEntry::make('user_id'),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}

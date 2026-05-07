<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class UserInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     *
     * Campi basati su Model User.php -> id, name, first_name, last_name, email, is_active, is_otp, lang
     */
    public static function getInfolistSchema(): array
    {
        return [
            'name' => TextEntry::make('name'),
            'first_name' => TextEntry::make('first_name'),
            'last_name' => TextEntry::make('last_name'),
            'email' => TextEntry::make('email'),
            'is_active' => TextEntry::make('is_active')
                ->badge()
                ->formatStateUsing(fn (bool $state): string => $state ? 'Active' : 'Inactive'),
            'is_otp' => TextEntry::make('is_otp')
                ->badge()
                ->formatStateUsing(fn (bool $state): string => $state ? 'Enabled' : 'Disabled'),
            'lang' => TextEntry::make('lang'),
            'email_verified_at' => TextEntry::make('email_verified_at')->dateTime(),
            'created_at' => TextEntry::make('created_at')->dateTime(),
            'updated_at' => TextEntry::make('updated_at')->dateTime(),
        ];
    }
}

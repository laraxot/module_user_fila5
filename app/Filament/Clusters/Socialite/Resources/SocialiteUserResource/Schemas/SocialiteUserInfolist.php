<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SocialiteUserResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< HEAD

class SocialiteUserInfolist
{
    /**
     * @return array<string, TextEntry>
     */
    public function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'created_at' => TextEntry::make('created_at')->dateTime(),
=======
use Filament\Schemas\Components\Component;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Models\SocialiteUser;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class SocialiteUserInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component>
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'user_name' => TextEntry::make('user.name')
                ->url(function (mixed $state, ?SocialiteUser $record): ?string {
                    if (null === $record) {
                        return null;
                    }

                    $user = $record->user;
                    if (($user instanceof Model) && $user->exists) {
                        return (string) UserResource::getUrl('view', ['record' => $user]);
                    }

                    return null;
                }),
            'provider' => TextEntry::make('provider')
                ->formatStateUsing(fn ($state): string => is_string($state) ? Str::title($state) : ''),
            'provider_id' => TextEntry::make('provider_id')
                ->copyable()
                ->copyMessage('Provider ID copied'),
            'name' => TextEntry::make('name'),
            'email' => TextEntry::make('email')
                ->copyable()
                ->copyMessage('Email copied'),
            'avatar' => TextEntry::make('avatar')
                ->url(fn (mixed $state): ?string => is_string($state) && '' !== $state ? $state : null)
                ->openUrlInNewTab(),
            'token' => TextEntry::make('token')
                ->copyable()
                ->copyMessage('Token copied'),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
>>>>>>> f589f9b2 (.)
        ];
    }
}

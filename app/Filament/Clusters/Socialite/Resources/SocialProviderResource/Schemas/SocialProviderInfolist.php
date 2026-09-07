<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SocialProviderResource\Schemas;

use Filament\Infolists\Components\TextEntry;
<<<<<<< HEAD

class SocialProviderInfolist
{
    /**
     * @return array<string, TextEntry>
     */
    public function getInfolistSchema(): array
=======
use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

use function Safe\json_encode;

class SocialProviderInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component>
     */
    public static function getInfolistSchema(): array
>>>>>>> f589f9b2 (.)
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
<<<<<<< HEAD
            'created_at' => TextEntry::make('created_at')->dateTime(),
=======
            'scopes' => TextEntry::make('scopes')->formatStateUsing(function ($state): string {
                if (is_array($state)) {
                    return json_encode($state);
                }

                return is_string($state) ? $state : (is_scalar($state) ? (string) $state : '');
            }),
            'parameters' => TextEntry::make('parameters')->formatStateUsing(function ($state): string {
                if (is_array($state)) {
                    return json_encode($state);
                }

                return is_string($state) ? $state : (is_scalar($state) ? (string) $state : '');
            }),
            'stateless' => TextEntry::make('stateless')->badge()->color(fn (bool $state): string => $state ? 'success' : 'danger'),
            'active' => TextEntry::make('active')->badge()->color(fn (bool $state): string => $state ? 'success' : 'danger'),
            'socialite' => TextEntry::make('socialite')->badge()->color(fn (bool $state): string => $state ? 'success' : 'danger'),
            'svg' => TextEntry::make('svg')->html(),
            'created_at' => TextEntry::make('created_at')->dateTime(),
            'updated_at' => TextEntry::make('updated_at')->dateTime(),
>>>>>>> f589f9b2 (.)
        ];
    }
}

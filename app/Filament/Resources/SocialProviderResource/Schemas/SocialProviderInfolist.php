<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\SocialProviderResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

<<<<<<< HEAD
=======
use function Safe\json_encode;

>>>>>>> f589f9b2 (.)
class SocialProviderInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     *
     * Campi basati sul Model SocialProvider.php -> id, name, scopes, parameters, stateless, active, socialite, svg
     */
<<<<<<< HEAD
    public function getInfolistSchema(): array
=======
    public static function getInfolistSchema(): array
>>>>>>> f589f9b2 (.)
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
<<<<<<< HEAD
            'scopes' => TextEntry::make('scopes'),
            'parameters' => TextEntry::make('parameters'),
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
>>>>>>> f589f9b2 (.)
            'stateless' => TextEntry::make('stateless')
                ->badge(),
            'active' => TextEntry::make('active')
                ->badge(),
            'socialite' => TextEntry::make('socialite')
                ->badge(),
<<<<<<< HEAD
            'svg' => TextEntry::make('svg'),
=======
            'svg' => TextEntry::make('svg')->html(),
>>>>>>> f589f9b2 (.)
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}

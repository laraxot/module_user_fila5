<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\BaseProfileResource\Schemas;

<<<<<<< HEAD
=======
use Filament\Infolists\Components\ImageEntry;
>>>>>>> f589f9b2 (.)
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class BaseProfileInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component>
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
            'created_at' => TextEntry::make('created_at')->dateTime(),
=======
            'email' => TextEntry::make('email'),
            'first_name' => TextEntry::make('first_name'),
            'last_name' => TextEntry::make('last_name'),
            'image' => ImageEntry::make('image')->hiddenLabel(),
            'content' => TextEntry::make('content')
                ->prose()
                ->markdown()
                ->hiddenLabel(),
            'created_at' => TextEntry::make('created_at')
                ->badge()
                ->date()
                ->color('success'),
>>>>>>> f589f9b2 (.)
        ];
    }
}

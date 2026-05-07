<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\DeviceResource\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Illuminate\Contracts\Support\Htmlable;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class DeviceInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<string, Component|Htmlable|string>
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'mobile_id' => TextEntry::make('mobile_id'),
            'languages' => TextEntry::make('languages')
                ->badge(),
            'device' => TextEntry::make('device'),
            'platform' => TextEntry::make('platform'),
            'browser' => TextEntry::make('browser'),
            'version' => TextEntry::make('version'),
            'is_robot' => IconEntry::make('is_robot')
                ->boolean(),
            'robot' => TextEntry::make('robot'),
            'is_desktop' => IconEntry::make('is_desktop')
                ->boolean(),
            'is_mobile' => IconEntry::make('is_mobile')
                ->boolean(),
            'is_tablet' => IconEntry::make('is_tablet')
                ->boolean(),
            'is_phone' => IconEntry::make('is_phone')
                ->boolean(),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}

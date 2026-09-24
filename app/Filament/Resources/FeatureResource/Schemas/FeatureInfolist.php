<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\FeatureResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
<<<<<<< HEAD
=======
use Illuminate\Contracts\Support\Htmlable;
>>>>>>> laraxot/dev
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

class FeatureInfolist extends XotBaseResourceInfolist
{
    /**
<<<<<<< HEAD
     * @return array<string, Component>
=======
     * @return array<string, Component|Htmlable|string>
>>>>>>> laraxot/dev
     *
     * Campi basati sul Model Feature.php -> id, name, scope, value
     */
    public function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'name' => TextEntry::make('name'),
            'scope' => TextEntry::make('scope'),
            'value' => TextEntry::make('value'),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
    }
}

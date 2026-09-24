<?php

declare(strict_types=1);

namespace Modules\User\Filament\Clusters\Socialite\Resources\SsoProviderResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Clusters\Socialite\Resources\SsoProviderResource;
<<<<<<< .merge_file_wVZrAz
use Modules\User\Filament\Clusters\Socialite\Resources\SsoProviderResource\Schemas\SsoProviderInfolist;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Clusters\Socialite\Resources\SsoProviderResource;
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_UREu8K
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewSsoProvider extends XotBaseViewRecord
{
    protected static string $resource = SsoProviderResource::class;
<<<<<<< .merge_file_wVZrAz

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
=======
     * @return array<string, Component>
>>>>>>> 350420cb (Check & fix styling)
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
<<<<<<< HEAD
        return app(SsoProviderInfolist::class)->getInfolistSchema();
=======
        return [
            'main' => Section::make()->schema([
                'name' => TextEntry::make('name'),
                'display_name' => TextEntry::make('display_name'),
                'type' => TextEntry::make('type'),
                'entity_id' => TextEntry::make('entity_id'),
                'client_id' => TextEntry::make('client_id'),
                'redirect_url' => TextEntry::make('redirect_url'),
                'metadata_url' => TextEntry::make('metadata_url'),
                'is_active' => TextEntry::make('is_active'),
                'created_at' => TextEntry::make('created_at')->dateTime(),
                'updated_at' => TextEntry::make('updated_at')->dateTime(),
            ]),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
=======
>>>>>>> .merge_file_UREu8K
}

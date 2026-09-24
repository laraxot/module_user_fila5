<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\OauthPersonalAccessClientResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\OauthPersonalAccessClientResource;
use Modules\User\Filament\Resources\OauthPersonalAccessClientResource\Schemas\OauthPersonalAccessClientInfolist;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\OauthPersonalAccessClientResource;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Class ViewOauthPersonalAccessClient.
 */
class ViewOauthPersonalAccessClient extends XotBaseViewRecord
{
    protected static string $resource = OauthPersonalAccessClientResource::class;

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
        return app(OauthPersonalAccessClientInfolist::class)->getInfolistSchema();
=======
        return [
            'oauth_personal_access_client' => Section::make()->schema([
                'id' => TextEntry::make('id'),
                'client_id' => TextEntry::make('client_id'),
                'created_at' => TextEntry::make('created_at')->dateTime(),
                'updated_at' => TextEntry::make('updated_at')->dateTime(),
            ]),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
}

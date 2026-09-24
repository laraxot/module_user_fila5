<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\ClientResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\ClientResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
=======
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Modules\User\Filament\Resources\ClientResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\Xot\Filament\Schemas\Components\XotBaseSection;
>>>>>>> 350420cb (Check & fix styling)

class ViewClient extends XotBaseViewRecord
{
    protected static string $resource = ClientResource::class;

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return [];
=======
     * @return array<string, Component>
     */
    public function getInfolistSchema(): array
    {
        return [
            'client_info' => XotBaseSection::make('Client')
                ->schema([
                    'id' => TextEntry::make('id'),
                    'name' => TextEntry::make('name'),
                    'user' => TextEntry::make('user.name'),
                    'provider' => TextEntry::make('provider'),
                    'redirect' => TextEntry::make('redirect'),
                    'revoked' => IconEntry::make('revoked')->boolean(),
                    'created_at' => TextEntry::make('created_at')->dateTime(),
                ]),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
}

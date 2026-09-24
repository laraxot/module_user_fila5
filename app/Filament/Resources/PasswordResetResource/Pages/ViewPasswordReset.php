<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PasswordResetResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\PasswordResetResource;
<<<<<<< .merge_file_neye0a
use Modules\User\Filament\Resources\PasswordResetResource\Schemas\PasswordResetInfolist;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Modules\User\Filament\Resources\PasswordResetResource;
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_6Ybhj3
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewPasswordReset extends XotBaseViewRecord
{
    protected static string $resource = PasswordResetResource::class;
<<<<<<< .merge_file_neye0a

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
        return app(PasswordResetInfolist::class)->getInfolistSchema();
=======
        return [
            'password_reset_info' => Section::make('Password Reset Information')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('email')
                                ->copyable()
                                ->copyMessage('Email copied'),
                            TextEntry::make('token')
                                ->copyable()
                                ->copyMessage('Token copied')
                                ->columnSpanFull(),
                        ]),
                ])->columns(1),

            'timestamps' => Section::make('Timestamps')
                ->schema([
                    Grid::make(2)
                        ->schema([
                            TextEntry::make('created_at')
                                ->dateTime(),
                            TextEntry::make('updated_at')
                                ->dateTime(),
                        ]),
                ])->columns(1),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
=======
>>>>>>> .merge_file_6Ybhj3
}

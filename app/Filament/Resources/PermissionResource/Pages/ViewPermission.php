<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\PermissionResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\PermissionResource;
<<<<<<< .merge_file_S2gZ0k
use Modules\User\Filament\Resources\PermissionResource\Schemas\PermissionInfolist;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Support\Components\Component;
use Modules\User\Filament\Resources\PermissionResource;
>>>>>>> 350420cb (Check & fix styling)
=======
>>>>>>> .merge_file_LGEEJD
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

class ViewPermission extends XotBaseViewRecord
{
    protected static string $resource = PermissionResource::class;
<<<<<<< .merge_file_S2gZ0k

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(PermissionInfolist::class)->getInfolistSchema();
=======
     * @return array<string, Component>
     */
    #[\Override]
    public function getInfolistSchema(): array
    {
        return [
            'name' => TextEntry::make('name'),
            'guard_name' => TextEntry::make('guard_name'),
            'active' => TextEntry::make('active')
                ->formatStateUsing(fn ($state): string => $state ? __('user::common.yes') : __('user::common.no')),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
=======
>>>>>>> .merge_file_LGEEJD
}

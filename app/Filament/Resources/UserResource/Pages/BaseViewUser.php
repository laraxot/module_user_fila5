<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

<<<<<<< HEAD
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Schemas\UserInfolist;
=======
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Modules\User\Filament\Resources\UserResource;
>>>>>>> 350420cb (Check & fix styling)
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;

/**
 * Base class for viewing user resources.
 *
 * This class provides the base configuration for viewing user resources
 * across the application. It should be extended by specific user type
 * view classes rather than used directly.
 */
abstract class BaseViewUser extends XotBaseViewRecord
{
    protected static string $resource = UserResource::class;

    /**
<<<<<<< HEAD
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(UserInfolist::class)->getInfolistSchema();
=======
     * Define the infolist schema for the view.
     *
     * @return array<string, Component>
     */
    #[\Override]
    public function getInfolistSchema(): array
    {
        return [
            'name' => TextEntry::make('name'),
            'email' => TextEntry::make('email'),
            'type' => TextEntry::make('type'),
            'state' => TextEntry::make('state'),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
            'updated_at' => TextEntry::make('updated_at')
                ->dateTime(),
        ];
>>>>>>> 350420cb (Check & fix styling)
    }
}

<?php

/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/resources/UserResource/Pages/EditUser.php
 * Pagina di modifica utente per Filament.
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Schema;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserWidget;
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
use Filament\Schemas\Schema;
use Webmozart\Assert\Assert;
use InvalidArgumentException;
use Modules\User\Models\User;
use Filament\Actions\DeleteAction;
use Illuminate\Support\Facades\Hash;
use Filament\Resources\Pages\EditRecord;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\DatePicker;
use Modules\User\Filament\Resources\UserResource;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Widgets\ChartWidget\Concerns\HasFiltersSchema;
use Modules\User\Filament\Resources\UserResource\Widgets\UserWidget;
use Modules\Xot\Filament\Resources\RelationManagers\XotBaseRelationManager;
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Schema;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserWidget;
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

/**
 * Pagina per la modifica degli utenti con particolare gestione della password.
 */
class ViewUser extends BaseViewUser
{
    use HasFiltersForm;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev

    protected static string $resource = UserResource::class;

    protected string $view = 'user::filament.resources.user.pages.view-user';

<<<<<<< HEAD
=======
    protected static string $resource = UserResource::class;
    protected string $view = 'user::filament.resources.user.pages.view-user';
>>>>>>> f548be94 (.)
=======
    protected static string $resource = UserResource::class;
    protected string $view = 'user::filament.resources.user.pages.view-user';
=======

    protected static string $resource = UserResource::class;

    protected string $view = 'user::filament.resources.user.pages.view-user';

>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    protected bool $persistsFiltersInSession = true;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            ->components([
=======
            ->schema([
>>>>>>> f548be94 (.)
=======
            ->schema([
=======
            ->components([
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
            ->components([
>>>>>>> laraxot/dev
                DatePicker::make('startDate'),
                DatePicker::make('endDate'),
            ])->columns(2);
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev

    public function getFooterWidgets(): array
    {
        return [
            UserWidget::class,
        ];
    }
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
   
   public function getFooterWidgets(): array
   {
    return [
        UserWidget::class,
    ];
   }
    
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======

    public function getFooterWidgets(): array
    {
        return [
            UserWidget::class,
        ];
    }
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}

<?php

/**
 * @see https://github.com/ryangjchandler/filament-user-resource/blob/main/src/resources/UserResource/Pages/EditUser.php
 * Pagina di modifica utente per Filament.
 */

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Forms\Components\DatePicker;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Schema;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Widgets\UserWidget;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

/**
 * Pagina per la modifica degli utenti con particolare gestione della password.
 */
class ViewUser extends BaseViewUser
{
    use HasFiltersForm;
<<<<<<< HEAD
<<<<<<< HEAD
    protected static string $resource = UserResource::class;
    protected string $view = 'user::filament.resources.user.pages.view-user';
=======
=======
>>>>>>> f589f9b2 (.)

    protected static string $resource = UserResource::class;

    protected string $view = 'user::filament.resources.user.pages.view-user';

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    protected bool $persistsFiltersInSession = true;

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
<<<<<<< HEAD
<<<<<<< HEAD
            ->schema([
=======
            ->components([
>>>>>>> 2024e2e7 (.)
=======
            ->components([
>>>>>>> f589f9b2 (.)
                DatePicker::make('startDate'),
                DatePicker::make('endDate'),
            ])->columns(2);
    }
<<<<<<< HEAD
<<<<<<< HEAD
   
   public function getFooterWidgets(): array
   {
    return [
        UserWidget::class,
    ];
   }
    
=======
=======
>>>>>>> f589f9b2 (.)

    public function getFooterWidgets(): array
    {
        return [
            UserWidget::class,
        ];
    }
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}

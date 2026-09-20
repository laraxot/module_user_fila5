<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Models\AuthenticationLog;
use Modules\Xot\Filament\Widgets\XotBaseTableWidget;

final class RecentLoginsWidget extends XotBaseTableWidget
{
    protected static ?string $heading = 'Recent Logins'; // Rendi static la proprietà
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\User\Models\AuthenticationLog;

class RecentLoginsWidget extends BaseWidget
{
    protected static null|string $heading = 'Recent Logins'; // Rendi static la proprietà
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Models\AuthenticationLog;
use Modules\Xot\Filament\Widgets\XotBaseTableWidget;

final class RecentLoginsWidget extends XotBaseTableWidget
{
    protected static ?string $heading = 'Recent Logins'; // Rendi static la proprietà
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

    protected int|string|array $columnSpan = 'full';

    /**
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
     * Define the query to fetch recent logins.
     */
    protected function getTableQuery(): Builder|Relation|null
    {
        return AuthenticationLog::query()
            ->where('login_successful', true)
            ->orderBy('login_at', 'desc')
            ->limit(10); // Mostra gli ultimi 10 logins
    }

    /**
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
     * Convenzione documentata in
     * Modules/Xot/docs/wiki/concepts/has-relationship-model-class.md:
     * per i widget, HasXotTable::getModelClass() risolve il model tramite
     * getModel(): string — senza questo metodo lancia "No model found",
     * riprodotto dal vivo aprendo la dashboard del modulo User.
     */
    public function getModel(): string
    {
        return AuthenticationLog::class;
    }

    /**
>>>>>>> laraxot/dev
     * Define the columns to display in the table.
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
            'user' => TextColumn::make('user'),
            'login_at' => TextColumn::make('login_at'),
            'ip_address' => TextColumn::make('ip_address'),
            'user_agent' => TextColumn::make('user_agent'),
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
            TextColumn::make('user'),
            TextColumn::make('login_at'),
            TextColumn::make('ip_address'),
            TextColumn::make('user_agent'),
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
            'user' => TextColumn::make('user'),
            'login_at' => TextColumn::make('login_at'),
            'ip_address' => TextColumn::make('ip_address'),
            'user_agent' => TextColumn::make('user_agent'),
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
        ];
    }

    /**
     * Optionally configure additional table settings.
     *
     * @return array<string, Action|ActionGroup>
     */
    public function getTableActions(): array
    {
        return [];
    }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev

    /**
     * Define the query to fetch recent logins.
     *
     * @return Builder<AuthenticationLog>
     */
    protected function getTableQuery(): Builder
    {
        return AuthenticationLog::query()
            ->where('login_successful', true)
            ->orderBy('login_at', 'desc')
            ->limit(10);
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> f548be94 (.)
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}

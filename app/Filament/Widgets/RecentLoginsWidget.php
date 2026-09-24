<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Models\AuthenticationLog;
use Modules\Xot\Filament\Widgets\XotBaseTableWidget;

final class RecentLoginsWidget extends XotBaseTableWidget
=======
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Models\AuthenticationLog;

final class RecentLoginsWidget extends BaseWidget
>>>>>>> 350420cb (Check & fix styling)
{
    protected static ?string $heading = 'Recent Logins'; // Rendi static la proprietà

    protected int|string|array $columnSpan = 'full';

    /**
<<<<<<< HEAD
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
=======
>>>>>>> 350420cb (Check & fix styling)
     * Define the columns to display in the table.
     */
    public function getTableColumns(): array
    {
        return [
            'user' => TextColumn::make('user'),
            'login_at' => TextColumn::make('login_at'),
            'ip_address' => TextColumn::make('ip_address'),
            'user_agent' => TextColumn::make('user_agent'),
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

    /**
     * Define the query to fetch recent logins.
<<<<<<< HEAD
     *
     * @return Builder<AuthenticationLog>
     */
=======
     */
    /** @return Builder<AuthenticationLog> */
>>>>>>> 350420cb (Check & fix styling)
    protected function getTableQuery(): Builder
    {
        return AuthenticationLog::query()
            ->where('login_successful', true)
            ->orderBy('login_at', 'desc')
            ->limit(10);
    }
}

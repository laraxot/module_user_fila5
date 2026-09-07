<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
<<<<<<< HEAD
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\User\Models\AuthenticationLog;

class RecentLoginsWidget extends BaseWidget
{
    protected static null|string $heading = 'Recent Logins'; // Rendi static la proprietà
=======
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Models\AuthenticationLog;
use Modules\Xot\Filament\Widgets\XotBaseTableWidget;

final class RecentLoginsWidget extends XotBaseTableWidget
{
    protected static ?string $heading = 'Recent Logins'; // Rendi static la proprietà
>>>>>>> 2024e2e7 (.)

    protected int|string|array $columnSpan = 'full';

    /**
<<<<<<< HEAD
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
=======
>>>>>>> 2024e2e7 (.)
     * Define the columns to display in the table.
     */
    public function getTableColumns(): array
    {
        return [
<<<<<<< HEAD
            TextColumn::make('user'),
            TextColumn::make('login_at'),
            TextColumn::make('ip_address'),
            TextColumn::make('user_agent'),
=======
            'user' => TextColumn::make('user'),
            'login_at' => TextColumn::make('login_at'),
            'ip_address' => TextColumn::make('ip_address'),
            'user_agent' => TextColumn::make('user_agent'),
>>>>>>> 2024e2e7 (.)
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
=======

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
>>>>>>> 2024e2e7 (.)
}

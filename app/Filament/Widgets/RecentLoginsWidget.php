<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets;

use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Modules\User\Models\AuthenticationLog;
use Modules\Xot\Filament\Widgets\XotBaseTableWidget;

final class RecentLoginsWidget extends XotBaseTableWidget
{
    protected static ?string $heading = null;

    protected int|string|array $columnSpan = 'full';

    /**
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

    public function getHeading(): ?string
    {
        return __('user::widgets.recent_logins.heading');
    }

    /**
     * Define the columns to display in the table.
     */
    public function getTableColumns(): array
    {
        return [
            'user' => TextColumn::make('user')
                ->label(__('user::widgets.recent_logins.columns.user'))
                ->searchable()
                ->sortable(),
            'login_at' => TextColumn::make('login_at')
                ->label(__('user::widgets.recent_logins.columns.login_at'))
                ->dateTime()
                ->sortable(),
            'ip_address' => TextColumn::make('ip_address')
                ->label(__('user::widgets.recent_logins.columns.ip_address'))
                ->searchable()
                ->sortable(),
            'user_agent' => TextColumn::make('user_agent')
                ->label(__('user::widgets.recent_logins.columns.user_agent'))
                ->limit(50)
                ->tooltip(fn ($record) => $record->user_agent ?? ''),
        ];
    }

    /**
     * Optionally configure additional table settings.
     *
     * @return array<string, \Filament\Actions\Action|\Filament\Actions\ActionGroup>
     */
    public function getTableActions(): array
    {
        return [];
    }

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
}

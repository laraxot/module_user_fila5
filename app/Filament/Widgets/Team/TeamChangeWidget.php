<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Team;

use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use InvalidArgumentException;
use Modules\User\Contracts\HasTeamsContract;
use Modules\User\Contracts\TeamContract;
use Modules\User\Events\TeamSwitched;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Filament\Widgets\XotBaseWidget;
use Webmozart\Assert\Assert;

/**
 * Chrome user-menu: switch del team corrente.
 *
 * Sostituisce `Modules\User\Http\Livewire\Team\Change`.
 */
class TeamChangeWidget extends XotBaseWidget
{
    protected static bool $isDiscovered = false;

    protected string $view = 'user::filament.widgets.team.change';

    public array $teams = [];

    public UserContract $user;

    public function mount(): void
    {
        $authUser = Filament::auth()->user();
        Assert::notNull($authUser, '['.__LINE__.']['.class_basename($this).']');

        if (! $authUser instanceof UserContract || ! $authUser instanceof HasTeamsContract) {
            throw new InvalidArgumentException('L\'utente deve implementare UserContract e HasTeamsContract');
        }

        $this->user = $authUser;
        $teams = [];
        foreach ($authUser->allTeams() as $team) {
            Assert::isInstanceOf($team, TeamContract::class);
            $teams[] = $team->toArray();
        }
        $this->teams = $teams;
    }

    /**
     * Aggiorna il team corrente dell'utente autenticato.
     */
    public function switchTeam(int $teamId): Application|RedirectResponse|Redirector
    {
        $teamClass = XotData::make()->getTeamClass();
        $team = $teamClass::firstWhere(['id' => $teamId]);

        if (! $team instanceof TeamContract || ! $this->user->switchTeam($team)) {
            abort(403);
        }

        TeamSwitched::dispatch($team, $this->user);

        Notification::make()
            ->title(__('user::team_change_widget.switched.title'))
            ->success()
            ->send();

        $path = config('filament.path', '/admin');
        Assert::string($path);

        return redirect($path, 303);
    }

    public function render(): View
    {
        /** @var view-string $viewName */
        $viewName = 'user::filament.widgets.team.change';

        if ([] === $this->teams) {
            $viewName = 'ui::livewire.empty';
        }

        return view($viewName, [
            'view' => $viewName,
            'teams' => $this->teams,
        ]);
    }
}

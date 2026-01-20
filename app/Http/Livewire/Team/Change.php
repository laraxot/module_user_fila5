<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Team;

<<<<<<< HEAD
=======
use InvalidArgumentException;
>>>>>>> f548be94 (.)
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
<<<<<<< HEAD
use Illuminate\Support\Collection;
=======
>>>>>>> f548be94 (.)
use Illuminate\View\View;
use Livewire\Component;
use Modules\User\Contracts\TeamContract;
use Modules\User\Events\TeamSwitched;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Webmozart\Assert\Assert;

class Change extends Component
{
    // use HasUserProperty;

<<<<<<< HEAD
    /** @var array<int, array<string, mixed>> */
=======
>>>>>>> f548be94 (.)
    public array $teams = [];

    public XotData $xot;

<<<<<<< HEAD
    public UserContract $user;
=======
    /** @var UserContract */
    public $user;
>>>>>>> f548be94 (.)

    public function mount(): void
    {
        $this->xot = XotData::make();
<<<<<<< HEAD
        Assert::notNull($authUser = Filament::auth()->user(), '['.__LINE__.']['.class_basename($this).']');

        // Verifica che l'utente implementi l'interfaccia UserContract
        if (! $authUser instanceof UserContract) {
            throw new \InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
        }

        $this->user = $authUser;
        /** @var Collection<int, TeamContract> $allTeams */
        $allTeams = $this->user->allTeams();
        $this->teams = $allTeams
            ->values()
            ->map(static fn (TeamContract $team): array => $team->toArray())
            ->all();
=======
        Assert::notNull($authUser = Filament::auth()->user(), '[' . __LINE__ . '][' . class_basename($this) . ']');

        // Verifica che l'utente implementi l'interfaccia UserContract
        if (!($authUser instanceof UserContract)) {
            throw new InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
        }

        $this->user = $authUser;
        $this->teams = $this->user->allTeams()->toArray();
>>>>>>> f548be94 (.)
    }

    /**
     * Update the authenticated user's current team.
     */
    public function switchTeam(int $teamId): Application|RedirectResponse|Redirector
    {
        $teamClass = $this->xot->getTeamClass();
        /** @var TeamContract */
        $team = $teamClass::firstWhere(['id' => $teamId]);

<<<<<<< HEAD
        if (! $this->user->switchTeam($team)) {
            abort(403);
        }
        if (null !== $team) {
=======
        if (!$this->user->switchTeam($team)) {
            abort(403);
        }
        if ($team !== null) {
>>>>>>> f548be94 (.)
            // TeamSwitched::dispatch($team->fresh(), $this->user);
            TeamSwitched::dispatch($team, $this->user);
        }
        Notification::make()
            ->title(__('Team switched'))
            ->success()
            ->send();
        /**
         * @var string|null
         */
        $path = config('filament.path');

        return redirect($path, 303);
    }

    public function render(): View
    {
        $view = 'user::livewire.team.change';
        $view_params = [
            'view' => $view,
        ];
<<<<<<< HEAD
        if ([] === $this->teams) {
=======
        if ($this->teams === []) {
>>>>>>> f548be94 (.)
            $view = 'ui::livewire.empty';
        }

        return view($view, $view_params);
    }
}

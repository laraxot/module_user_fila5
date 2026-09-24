<?php

declare(strict_types=1);

namespace Modules\User\Http\Livewire\Team;

use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
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
    /** @var array<int|string, mixed> */
>>>>>>> 350420cb (Check & fix styling)
    public array $teams = [];

    public XotData $xot;

<<<<<<< HEAD
    public UserContract $user;
=======
    /** @var UserContract */
    public $user;
>>>>>>> 350420cb (Check & fix styling)

    public function mount(): void
    {
        $this->xot = XotData::make();
        Assert::notNull($authUser = Filament::auth()->user(), '['.__LINE__.']['.class_basename($this).']');

        // Verifica che l'utente implementi l'interfaccia UserContract
        if (! $authUser instanceof UserContract) {
            throw new \InvalidArgumentException('L\'utente deve implementare l\'interfaccia UserContract');
        }

        $this->user = $authUser;
        /** @var Collection<int, TeamContract> $allTeams */
        $allTeams = $this->user->allTeams();
<<<<<<< HEAD
        $this->teams = $allTeams
            ->values()
            ->map(static fn (TeamContract $team): array => $team->toArray())
            ->all();
=======
        $this->teams = $allTeams->toArray();
>>>>>>> 350420cb (Check & fix styling)
    }

    /**
     * Update the authenticated user's current team.
     */
    public function switchTeam(int $teamId): Application|RedirectResponse|Redirector
    {
        $teamClass = $this->xot->getTeamClass();
        /** @var TeamContract */
        $team = $teamClass::firstWhere(['id' => $teamId]);

        if (! $this->user->switchTeam($team)) {
            abort(403);
        }
        if (null !== $team) {
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
<<<<<<< HEAD
        /** @phpstan-var view-string */
=======
>>>>>>> 350420cb (Check & fix styling)
        $view = 'user::livewire.team.change';
        $view_params = [
            'view' => $view,
        ];
        if ([] === $this->teams) {
<<<<<<< HEAD
            /** @phpstan-var view-string */
=======
>>>>>>> 350420cb (Check & fix styling)
            $view = 'ui::livewire.empty';
        }

        return view($view, $view_params);
    }
}

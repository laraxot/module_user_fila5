<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Contracts\Database\Query\Builder;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Actions\Socialite\Utils\EmailDomainAnalyzer;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\Permission\Guard;
use Spatie\QueueableAction\QueueableAction;

class SetDefaultRolesBySocialiteUserAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
    private readonly EmailDomainAnalyzer $domainAnalyzer;

    private readonly string $defaultUserGuard;

    public function __construct(
        private readonly string $provider,
    ) {
        $this->domainAnalyzer = app(EmailDomainAnalyzer::class, [
            'ssoProvider' => $this->provider,
        ]);

        $this->defaultUserGuard = Guard::getDefaultName(XotData::make()->getUserClass());
    }

    public function execute(UserContract $userModel, SocialiteUserContract $oauthUser): void
    {
        $this->domainAnalyzer->setUser($oauthUser);
=======
=======
>>>>>>> f589f9b2 (.)
    public function execute(string $provider, UserContract $userModel, SocialiteUserContract $oauthUser): void
    {
        $domainAnalyzer = app(EmailDomainAnalyzer::class, [
            'ssoProvider' => $provider,
        ]);
        /** @var Guard $permissionGuard */
        $permissionGuard = app(Guard::class);
        $xotData = XotData::make();

        $defaultUserGuard = $permissionGuard->getDefaultName($xotData->getUserClass());

        $domainAnalyzer->setUser($oauthUser);
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        // Do nothing if users already have some roles
        // bound to them: in this way we can update all
        // entities and expect a stable behaviour of the
        // platform
        if ($userModel->roles()->count() > 0) {
            return;
        }

        // Unrecognized domain: someone will have to set a role
        // to the user as a specific set of permissions cannot
        // be automatically inferred
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->domainAnalyzer->hasUnrecognizedDomain()) {
            return;
        }

        $defaultRoleNames = $this->domainAnalyzer->hasFirstPartyDomain()
            ? ((array) config(sprintf('services.%s.email_domains.first_party.role_names_search', $this->provider)))
            : ((array) config(sprintf('services.%s.email_domains.client.role_names_search', $this->provider)));
=======
=======
>>>>>>> f589f9b2 (.)
        if ($domainAnalyzer->hasUnrecognizedDomain()) {
            return;
        }

        $defaultRoleNames = $domainAnalyzer->hasFirstPartyDomain()
            ? ((array) config(sprintf('services.%s.email_domains.first_party.role_names_search', $provider)))
            : ((array) config(sprintf('services.%s.email_domains.client.role_names_search', $provider)));
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        $rolesToSet = Role::query()
            ->where(static function (Builder $query) use ($defaultRoleNames): void {
                foreach ($defaultRoleNames as $roleName) {
                    $query->orWhere('name', 'LIKE', $roleName);
                }
            })
<<<<<<< HEAD
<<<<<<< HEAD
            ->where('guard_name', '=', $this->defaultUserGuard)
=======
            ->where('guard_name', '=', $defaultUserGuard)
>>>>>>> 2024e2e7 (.)
=======
            ->where('guard_name', '=', $defaultUserGuard)
>>>>>>> f589f9b2 (.)
            ->get();

        // 73     Parameter #1 $roles of method Modules\Xot\Contracts\UserContract::assignRole() expects array, Illuminate\Database\Eloquent\Collection<int, Modules\User\Models\Role> given.
        $userModel->assignRole($rolesToSet);
    }
}

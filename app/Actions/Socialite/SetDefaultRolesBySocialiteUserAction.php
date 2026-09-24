<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Contracts\Database\Query\Builder;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
<<<<<<< HEAD
use Modules\User\Actions\Socialite\Utils\EmailDomainAnalyzer;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\Permission\Guard;
use Spatie\QueueableAction\QueueableAction;

class SetDefaultRolesBySocialiteUserAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(string $provider, UserContract $userModel, SocialiteUserContract $oauthUser): void
    {
        $domainAnalyzer = app(EmailDomainAnalyzer::class, [
            'ssoProvider' => $provider,
        ]);
=======
    public function __construct(
        private readonly AnalyzeSocialiteEmailDomainAction $analyzeSocialiteEmailDomainAction,
    ) {
    }

    public function execute(string $provider, UserContract $userModel, SocialiteUserContract $oauthUser): void
    {
>>>>>>> 350420cb (Check & fix styling)
        /** @var Guard $permissionGuard */
        $permissionGuard = app(Guard::class);
        $xotData = XotData::make();

        $defaultUserGuard = $permissionGuard->getDefaultName($xotData->getUserClass());

<<<<<<< HEAD
        $domainAnalyzer->setUser($oauthUser);

        // Do nothing if users already have some roles
        // bound to them: in this way we can update all
        // entities and expect a stable behaviour of the
        // platform
=======
        $domainAnalysis = $this->analyzeSocialiteEmailDomainAction->execute($oauthUser, $provider);

>>>>>>> 350420cb (Check & fix styling)
        if ($userModel->roles()->count() > 0) {
            return;
        }

<<<<<<< HEAD
        // Unrecognized domain: someone will have to set a role
        // to the user as a specific set of permissions cannot
        // be automatically inferred
        if ($domainAnalyzer->hasUnrecognizedDomain()) {
            return;
        }

        $defaultRoleNames = $domainAnalyzer->hasFirstPartyDomain()
=======
        if ($domainAnalysis->hasUnrecognizedDomain()) {
            return;
        }

        $defaultRoleNames = $domainAnalysis->hasFirstPartyDomain
>>>>>>> 350420cb (Check & fix styling)
            ? ((array) config(sprintf('services.%s.email_domains.first_party.role_names_search', $provider)))
            : ((array) config(sprintf('services.%s.email_domains.client.role_names_search', $provider)));

        $rolesToSet = Role::query()
            ->where(static function (Builder $query) use ($defaultRoleNames): void {
                foreach ($defaultRoleNames as $roleName) {
                    $query->orWhere('name', 'LIKE', $roleName);
                }
            })
            ->where('guard_name', '=', $defaultUserGuard)
            ->get();

<<<<<<< HEAD
        // 73     Parameter #1 $roles of method Modules\Xot\Contracts\UserContract::assignRole() expects array, Illuminate\Database\Eloquent\Collection<int, Modules\User\Models\Role> given.
=======
>>>>>>> 350420cb (Check & fix styling)
        $userModel->assignRole($rolesToSet);
    }
}

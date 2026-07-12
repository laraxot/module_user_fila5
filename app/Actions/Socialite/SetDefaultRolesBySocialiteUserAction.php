<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Contracts\Database\Query\Builder;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Models\Role;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\Permission\Guard;
use Spatie\QueueableAction\QueueableAction;

class SetDefaultRolesBySocialiteUserAction
{
    use QueueableAction;

    public function __construct(
        private readonly AnalyzeSocialiteEmailDomainAction $analyzeSocialiteEmailDomainAction,
    ) {
    }

    public function execute(string $provider, UserContract $userModel, SocialiteUserContract $oauthUser): void
    {
        /** @var Guard $permissionGuard */
        $permissionGuard = app(Guard::class);
        $xotData = XotData::make();

        $defaultUserGuard = $permissionGuard->getDefaultName($xotData->getUserClass());

        $domainAnalysis = $this->analyzeSocialiteEmailDomainAction->execute($oauthUser, $provider);

        if ($userModel->roles()->count() > 0) {
            return;
        }

        if ($domainAnalysis->hasUnrecognizedDomain()) {
            return;
        }

        $defaultRoleNames = $domainAnalysis->hasFirstPartyDomain
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

        $userModel->assignRole($rolesToSet);
    }
}

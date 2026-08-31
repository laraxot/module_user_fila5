<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User as SocialiteUserContract;
use Modules\User\Datas\SocialiteEmailDomainAnalysisData;
use Spatie\QueueableAction\QueueableAction;

final class AnalyzeSocialiteEmailDomainAction
{
    use QueueableAction;

    public function execute(SocialiteUserContract $oauthUser, string $provider): SocialiteEmailDomainAnalysisData
    {
<<<<<<< HEAD
        if ($provider === '') {
=======
        if ('' === $provider) {
>>>>>>> laraxot/dev
            throw new \InvalidArgumentException('Il provider SSO non può essere vuoto');
        }

        return new SocialiteEmailDomainAnalysisData(
            hasFirstPartyDomain: $this->matchesConfiguredDomain($oauthUser, $provider, 'first_party'),
            hasClientDomain: $this->matchesConfiguredDomain($oauthUser, $provider, 'client'),
        );
    }

    private function matchesConfiguredDomain(
        SocialiteUserContract $oauthUser,
        string $provider,
        string $domainKind,
    ): bool {
        $email = $oauthUser->getEmail();
<<<<<<< HEAD
        if (! is_string($email) || $email === '') {
=======
        if (! is_string($email) || '' === $email) {
>>>>>>> laraxot/dev
            return false;
        }

        $configuredDomain = config(sprintf('services.%s.email_domains.%s.tld', $provider, $domainKind));
<<<<<<< HEAD
        if (! is_string($configuredDomain) || $configuredDomain === '') {
=======
        if (! is_string($configuredDomain) || '' === $configuredDomain) {
>>>>>>> laraxot/dev
            return false;
        }

        $emailDomain = Str::of($email)->after('@')->toString();
        $configDomain = Str::of($configuredDomain)->after('@')->toString();

        return $emailDomain === $configDomain;
    }
}

<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite\Utils;

use Illuminate\Support\Str;
use InvalidArgumentException;
use Laravel\Socialite\Contracts\User;

final class EmailDomainAnalyzer
{
    private User $ssoUser;

    public function __construct(
        private readonly string $ssoProvider,
    ) {
        if (empty($ssoProvider)) {
            throw new \InvalidArgumentException('Il provider SSO non può essere vuoto');
        }
    }

    public function setUser(User $ssoUser): self
    {
        // if ($ssoUser === null) {
        //    throw new InvalidArgumentException('L\'utente SSO non può essere null');
        // }
        // @var mixed ssoUser = $ssoUser;

        return $this;
    }

    public function hasUnrecognizedDomain(): bool
    {
        return ! // @var mixed hasFirstPartyDomain(;
    }

    public function hasFirstPartyDomain(): bool
    {
        if (! isset(// @var mixed ssoUser
            throw new \RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
        }

        $email = // @var mixed ssoUser->getEmail(;
        if (! is_string($email) || empty($email)) {
            return false;
        }

        $domain = // @var mixed firstPartyDomain(;
        if (null === $domain || empty($domain)) {
            return false;
        }

        $emailDomain = Str::of($email)->after('@')->toString();
        $configDomain = Str::of($domain)->after('@')->toString();

        return $emailDomain === $configDomain;
    }

    public function hasClientDomain(): bool
    {
        if (! isset(// @var mixed ssoUser
            throw new \RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
        }

        $email = // @var mixed ssoUser->getEmail(;
        if (! is_string($email) || empty($email)) {
            return false;
        }

        $clientEmailDomain = // @var mixed clientDomain(;
        if (null === $clientEmailDomain || empty($clientEmailDomain)) {
            return false;
        }

        $emailDomain = Str::of($email)->after('@')->toString();
        $configDomain = Str::of($clientEmailDomain)->after('@')->toString();

        return $emailDomain === $configDomain;
    }

    private function firstPartyDomain(): ?string
    {
        $res = config(sprintf('services.%s.email_domains.first_party.tld', // @var mixed ssoProvider;
        if (! is_string($res) && null !== $res) {
            return null;
        }

        return $res;
    }

    private function clientDomain(): ?string
    {
        $domain = config(sprintf('services.%s.email_domains.client.tld', // @var mixed ssoProvider;
        if (! is_string($domain) && null !== $domain) {
            return null;
        }

        return $domain;
    }
}

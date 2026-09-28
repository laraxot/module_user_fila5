<?php

declare(strict_types=1);

namespace Modules\User\Adapters\Socialite;

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
<<<<<<< HEAD
            throw new InvalidArgumentException('Il provider SSO non può essere vuoto');
=======
            throw new \InvalidArgumentException('Il provider SSO non può essere vuoto');
>>>>>>> laraxot/dev
        }
    }

    public function setUser(User $ssoUser): self
    {
        // if ($ssoUser === null) {
        //    throw new InvalidArgumentException('L\'utente SSO non può essere null');
        // }
        $this->ssoUser = $ssoUser;

        return $this;
    }

    public function hasUnrecognizedDomain(): bool
    {
        return ! $this->hasFirstPartyDomain() && ! $this->hasClientDomain();
    }

    public function hasFirstPartyDomain(): bool
    {
        if (! isset($this->ssoUser)) {
            throw new \RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
        }

        $email = $this->ssoUser->getEmail();
        if (! is_string($email) || empty($email)) {
            return false;
        }

        $domain = $this->firstPartyDomain();
<<<<<<< HEAD
        if ($domain === null || empty($domain)) {
=======
        if (null === $domain || empty($domain)) {
>>>>>>> laraxot/dev
            return false;
        }

        $emailDomain = Str::of($email)->after('@')->toString();
        $configDomain = Str::of($domain)->after('@')->toString();

        return $emailDomain === $configDomain;
    }

    public function hasClientDomain(): bool
    {
        if (! isset($this->ssoUser)) {
            throw new \RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
        }

        $email = $this->ssoUser->getEmail();
        if (! is_string($email) || empty($email)) {
            return false;
        }

        $clientEmailDomain = $this->clientDomain();
<<<<<<< HEAD
        if ($clientEmailDomain === null || empty($clientEmailDomain)) {
=======
        if (null === $clientEmailDomain || empty($clientEmailDomain)) {
>>>>>>> laraxot/dev
            return false;
        }

        $emailDomain = Str::of($email)->after('@')->toString();
        $configDomain = Str::of($clientEmailDomain)->after('@')->toString();

        return $emailDomain === $configDomain;
    }

    private function firstPartyDomain(): ?string
    {
        $res = config(sprintf('services.%s.email_domains.first_party.tld', $this->ssoProvider));
<<<<<<< HEAD
        if (! is_string($res) && $res !== null) {
=======
        if (! is_string($res) && null !== $res) {
>>>>>>> laraxot/dev
            return null;
        }

        return $res;
    }

    private function clientDomain(): ?string
    {
        $domain = config(sprintf('services.%s.email_domains.client.tld', $this->ssoProvider));
<<<<<<< HEAD
        if (! is_string($domain) && $domain !== null) {
=======
        if (! is_string($domain) && null !== $domain) {
>>>>>>> laraxot/dev
            return null;
        }

        return $domain;
    }
}

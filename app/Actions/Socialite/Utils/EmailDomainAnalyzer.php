<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite\Utils;

<<<<<<< HEAD
<<<<<<< HEAD
use InvalidArgumentException;
use RuntimeException;
use Illuminate\Support\Str;
use Laravel\Socialite\Contracts\User;
use Webmozart\Assert\Assert;
=======
use Illuminate\Support\Str;
use InvalidArgumentException;
use Laravel\Socialite\Contracts\User;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Support\Str;
use InvalidArgumentException;
use Laravel\Socialite\Contracts\User;
>>>>>>> f589f9b2 (.)

final class EmailDomainAnalyzer
{
    private User $ssoUser;

    public function __construct(
        private readonly string $ssoProvider,
    ) {
        if (empty($ssoProvider)) {
<<<<<<< HEAD
<<<<<<< HEAD
            throw new InvalidArgumentException('Il provider SSO non può essere vuoto');
=======
            throw new \InvalidArgumentException('Il provider SSO non può essere vuoto');
>>>>>>> 2024e2e7 (.)
=======
            throw new \InvalidArgumentException('Il provider SSO non può essere vuoto');
>>>>>>> f589f9b2 (.)
        }
    }

    public function setUser(User $ssoUser): self
    {
<<<<<<< HEAD
<<<<<<< HEAD
        //if ($ssoUser === null) {
        //    throw new \InvalidArgumentException('L\'utente SSO non può essere null');
        //}
        $this->ssoUser = $ssoUser;
=======
=======
>>>>>>> f589f9b2 (.)
        // if ($ssoUser === null) {
        //    throw new InvalidArgumentException('L\'utente SSO non può essere null');
        // }
        $this->ssoUser = $ssoUser;

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        return $this;
    }

    public function hasUnrecognizedDomain(): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return !$this->hasFirstPartyDomain() && !$this->hasClientDomain();
=======
        return ! $this->hasFirstPartyDomain() && ! $this->hasClientDomain();
>>>>>>> 2024e2e7 (.)
=======
        return ! $this->hasFirstPartyDomain() && ! $this->hasClientDomain();
>>>>>>> f589f9b2 (.)
    }

    public function hasFirstPartyDomain(): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (!isset($this->ssoUser)) {
            throw new RuntimeException(
                'L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.',
            );
        }

        $email = $this->ssoUser->getEmail();
        if (!is_string($email) || empty($email)) {
=======
=======
>>>>>>> f589f9b2 (.)
        if (! isset($this->ssoUser)) {
            throw new \RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
        }

        $email = $this->ssoUser->getEmail();
        if (! is_string($email) || empty($email)) {
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            return false;
        }

        $domain = $this->firstPartyDomain();
<<<<<<< HEAD
<<<<<<< HEAD
        if ($domain === null || empty($domain)) {
=======
        if (null === $domain || empty($domain)) {
>>>>>>> 2024e2e7 (.)
=======
        if (null === $domain || empty($domain)) {
>>>>>>> f589f9b2 (.)
            return false;
        }

        $emailDomain = Str::of($email)->after('@')->toString();
        $configDomain = Str::of($domain)->after('@')->toString();

        return $emailDomain === $configDomain;
    }

    public function hasClientDomain(): bool
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if (!isset($this->ssoUser)) {
            throw new RuntimeException(
                'L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.',
            );
        }

        $email = $this->ssoUser->getEmail();
        if (!is_string($email) || empty($email)) {
=======
=======
>>>>>>> f589f9b2 (.)
        if (! isset($this->ssoUser)) {
            throw new \RuntimeException('L\'utente SSO non è stato impostato. Utilizzare setUser() prima di chiamare questo metodo.');
        }

        $email = $this->ssoUser->getEmail();
        if (! is_string($email) || empty($email)) {
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            return false;
        }

        $clientEmailDomain = $this->clientDomain();
<<<<<<< HEAD
<<<<<<< HEAD
        if ($clientEmailDomain === null || empty($clientEmailDomain)) {
=======
        if (null === $clientEmailDomain || empty($clientEmailDomain)) {
>>>>>>> 2024e2e7 (.)
=======
        if (null === $clientEmailDomain || empty($clientEmailDomain)) {
>>>>>>> f589f9b2 (.)
            return false;
        }

        $emailDomain = Str::of($email)->after('@')->toString();
        $configDomain = Str::of($clientEmailDomain)->after('@')->toString();

        return $emailDomain === $configDomain;
    }

<<<<<<< HEAD
<<<<<<< HEAD
    private function firstPartyDomain(): null|string
    {
        $res = config(sprintf('services.%s.email_domains.first_party.tld', $this->ssoProvider));
        if (!is_string($res) && $res !== null) {
            return null;
        }
        return $res;
    }

    private function clientDomain(): null|string
    {
        $domain = config(sprintf('services.%s.email_domains.client.tld', $this->ssoProvider));
        if (!is_string($domain) && $domain !== null) {
            return null;
        }
=======
=======
>>>>>>> f589f9b2 (.)
    private function firstPartyDomain(): ?string
    {
        $res = config(sprintf('services.%s.email_domains.first_party.tld', $this->ssoProvider));
        if (! is_string($res) && null !== $res) {
            return null;
        }

        return $res;
    }

    private function clientDomain(): ?string
    {
        $domain = config(sprintf('services.%s.email_domains.client.tld', $this->ssoProvider));
        if (! is_string($domain) && null !== $domain) {
            return null;
        }

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        return $domain;
    }
}

<?php

declare(strict_types=1);

namespace Modules\User\Tests\Fakes;

use Jenssegers\Agent\Agent;

/**
 * Agent test double — no Mockery magic (PHPStan L10 friendly).
 */
final class FakeAgent extends Agent
{
    public string|bool|null $fakeDevice = null;

    public string|bool|null $fakePlatform = null;

    public string|bool|null $fakeBrowser = null;

    public bool $fakeIsDesktop = false;

    public bool $fakeIsMobile = false;

    public bool $fakeIsTablet = false;

    public bool $fakeIsPhone = false;

    public bool $fakeIsRobot = false;

    /** @var array<string, string|bool|null> */
    public array $fakeVersions = [];

    public string|bool|null $fakeRobot = null;

    /**
<<<<<<< HEAD
     * @param  string|null  $userAgent
=======
     * @param string|null $userAgent
     *
>>>>>>> laraxot/dev
     * @return string|bool
     */
    #[\Override]
    public function device($userAgent = null)
    {
        return $this->fakeDevice ?? false;
    }

    /**
<<<<<<< HEAD
     * @param  string|null  $userAgent
=======
     * @param string|null $userAgent
     *
>>>>>>> laraxot/dev
     * @return string|bool
     */
    #[\Override]
    public function platform($userAgent = null)
    {
        return $this->fakePlatform ?? false;
    }

    /**
<<<<<<< HEAD
     * @param  string|null  $userAgent
=======
     * @param string|null $userAgent
     *
>>>>>>> laraxot/dev
     * @return string|bool
     */
    #[\Override]
    public function browser($userAgent = null)
    {
        return $this->fakeBrowser ?? false;
    }

    /**
<<<<<<< HEAD
     * @param  string|null  $userAgent
     * @param  array<string, mixed>|null  $httpHeaders
=======
     * @param string|null               $userAgent
     * @param array<string, mixed>|null $httpHeaders
>>>>>>> laraxot/dev
     */
    #[\Override]
    public function isDesktop($userAgent = null, $httpHeaders = null): bool
    {
        return $this->fakeIsDesktop;
    }

    /**
<<<<<<< HEAD
     * @param  string|null  $userAgent
     * @param  array<string, mixed>|null  $httpHeaders
=======
     * @param string|null               $userAgent
     * @param array<string, mixed>|null $httpHeaders
>>>>>>> laraxot/dev
     */
    #[\Override]
    public function isMobile($userAgent = null, $httpHeaders = null): bool
    {
        return $this->fakeIsMobile;
    }

    /**
<<<<<<< HEAD
     * @param  string|null  $userAgent
     * @param  array<string, mixed>|null  $httpHeaders
=======
     * @param string|null               $userAgent
     * @param array<string, mixed>|null $httpHeaders
>>>>>>> laraxot/dev
     */
    #[\Override]
    public function isTablet($userAgent = null, $httpHeaders = null): bool
    {
        return $this->fakeIsTablet;
    }

    /**
<<<<<<< HEAD
     * @param  string|null  $userAgent
     * @param  array<string, mixed>|null  $httpHeaders
=======
     * @param string|null               $userAgent
     * @param array<string, mixed>|null $httpHeaders
>>>>>>> laraxot/dev
     */
    #[\Override]
    public function isPhone($userAgent = null, $httpHeaders = null): bool
    {
        return $this->fakeIsPhone;
    }

    /**
<<<<<<< HEAD
     * @param  string|null  $userAgent
=======
     * @param string|null $userAgent
>>>>>>> laraxot/dev
     */
    #[\Override]
    public function isRobot($userAgent = null): bool
    {
        return $this->fakeIsRobot;
    }

    /**
<<<<<<< HEAD
     * @param  string  $propertyName
     * @param  string  $type
=======
     * @param string $propertyName
     * @param string $type
     *
>>>>>>> laraxot/dev
     * @return string|bool
     */
    #[\Override]
    public function version($propertyName, $type = self::VERSION_TYPE_STRING)
    {
        return $this->fakeVersions[$propertyName] ?? false;
    }

    /**
<<<<<<< HEAD
     * @param  string|null  $userAgent
=======
     * @param string|null $userAgent
     *
>>>>>>> laraxot/dev
     * @return string|bool
     */
    #[\Override]
    public function robot($userAgent = null)
    {
        return $this->fakeRobot ?? false;
    }
}

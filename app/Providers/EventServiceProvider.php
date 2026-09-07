<?php

declare(strict_types=1);

namespace Modules\User\Providers;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\OtherDeviceLogout;
<<<<<<< HEAD
<<<<<<< HEAD
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Listeners\FailedLoginListener;
use Modules\User\Listeners\LoginListener;
use Modules\User\Listeners\LogoutListener;
use Modules\User\Listeners\OtherDeviceLogoutListener;
use Modules\Xot\Providers\XotBaseEventServiceProvider;
use SocialiteProviders\Auth0\Auth0ExtendSocialite;
use SocialiteProviders\Manager\SocialiteWasCalled;

class EventServiceProvider extends XotBaseEventServiceProvider
{
    public string $name = 'User';
<<<<<<< HEAD
<<<<<<< HEAD
    public string $nameLower = 'user';
    protected string $module_dir = __DIR__;
=======
=======
>>>>>>> f589f9b2 (.)

    public string $nameLower = 'user';

    protected string $module_dir = __DIR__;

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    protected string $module_ns = __NAMESPACE__;

    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        SocialiteWasCalled::class => [
            Auth0ExtendSocialite::class,
        ],
        Login::class => [
            LoginListener::class,
        ],
        Logout::class => [
            LogoutListener::class,
        ],
        Failed::class => [
            FailedLoginListener::class,
        ],
        OtherDeviceLogout::class => [
            OtherDeviceLogoutListener::class,
        ],
    ];

<<<<<<< HEAD
<<<<<<< HEAD
=======
    /**
     * @var array<int, class-string>
     */
>>>>>>> 2024e2e7 (.)
=======
    /**
     * @var array<int, class-string>
     */
>>>>>>> f589f9b2 (.)
    protected $subscribe = [
        // Aggiungi qui i subscriber specifici del modulo
    ];
}

<?php

declare(strict_types=1);

namespace Modules\User\Providers;

use Illuminate\Auth\Events\Failed;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\OtherDeviceLogout;
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
=======
    public string $nameLower = 'user';

    protected string $module_dir = __DIR__;

>>>>>>> 350420cb (Check & fix styling)
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
    /**
     * @var array<int, class-string>
     */
=======
    /** @var array<int, class-string> */
>>>>>>> 350420cb (Check & fix styling)
    protected $subscribe = [
        // Aggiungi qui i subscriber specifici del modulo
    ];
}

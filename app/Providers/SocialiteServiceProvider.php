<?php

declare(strict_types=1);

namespace Modules\User\Providers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\ServiceProvider as BaseSocialiteServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Microsoft\Provider;
=======
use Illuminate\Support\Facades\Event;
use SocialiteProviders\Manager\ServiceProvider as BaseSocialiteServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
>>>>>>> 350420cb (Check & fix styling)

class SocialiteServiceProvider extends BaseSocialiteServiceProvider
{
    /**
<<<<<<< HEAD
     * Register the provider services.
     */
    public function register(): void
    {
        parent::register();

        // Load admin-configured OAuth settings from secure file
        $this->loadAdminSocialiteConfig();
    }

    /**
=======
>>>>>>> 350420cb (Check & fix styling)
     * Bootstrap the provider services.
     */
    public function boot(): void
    {
        parent::boot();

        Event::listen(function (SocialiteWasCalled $event): void {
<<<<<<< HEAD
            $event->extendSocialite('microsoft', Provider::class);
        });
    }

    /**
     * Load admin-configured OAuth settings from secure file.
     * This allows admins to configure GOOGLE_CLIENT_ID/SECRET via backoffice UI.
     */
    private function loadAdminSocialiteConfig(): void
    {
        $adminConfigPath = storage_path('app/private/socialite-config.php');

        if (! file_exists($adminConfigPath)) {
            return;
        }

        /** @var array<string, array<string, mixed>> $adminConfig */
        $adminConfig = require $adminConfigPath;

        foreach ($adminConfig as $provider => $settings) {
            if (! is_array($settings)) {
                continue;
            }

            // Merge with existing services config
            /** @var array<string, mixed> $existingConfig */
            $existingConfig = Config::get("services.{$provider}", []);
            /* @var array<string, mixed> $settings */
            Config::set("services.{$provider}", array_merge($existingConfig, $settings));
        }
    }
=======
            if (class_exists('SocialiteProviders\\Microsoft\\Provider')) {
                $event->extendSocialite('microsoft', \SocialiteProviders\Microsoft\Provider::class);
            }
        });
    }
>>>>>>> 350420cb (Check & fix styling)
}

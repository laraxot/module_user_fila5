<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\QueueableAction\QueueableAction;

/**
 * L'unico URI di callback da registrare presso il provider (DCP-269): quello nella lingua predefinita, non nella
 * lingua della pagina. La guida «provider non configurato» e la pagina del back office leggono da qui.
 */
class GetProviderRedirectUriAction
{
    use QueueableAction;

    public function execute(string $provider): string
    {
        return route('oauth.callback', [
            'lang' => (string) LaravelLocalization::getDefaultLocale(),
            'provider' => $provider,
        ]);
    }
}

<?php

declare(strict_types=1);

namespace Modules\User\Datas;

use Modules\Xot\Datas\Concerns\MakesFromTenantConfig;
use Spatie\LaravelData\Data;

/** Config tenant per la SettingPage di User, senza chiavi esposte al form. */
class UserConfigData extends Data
{
    use MakesFromTenantConfig;

<<<<<<< HEAD
    public bool $enabled = true;
=======
    public bool $registration_enabled = true;

    public bool $email_verification_required = true;
>>>>>>> c1257e0346954430c15cc387a2760889e222e4b9
}

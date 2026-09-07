<?php

declare(strict_types=1);

namespace Modules\User\Enums;

<<<<<<< HEAD
<<<<<<< HEAD
enum SocialProviderEnum: string
{
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

enum SocialProviderEnum: string implements HasLabel
{
    use EnumTrait;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    case GOOGLE = 'google';
    case AUTH0 = 'auth0';
}

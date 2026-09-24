<?php

declare(strict_types=1);

namespace Modules\User\Enums;

<<<<<<< HEAD
use Filament\Support\Contracts\HasLabel;
use Modules\Xot\Traits\EnumTrait;

enum SocialProviderEnum: string implements HasLabel
{
    use EnumTrait;
=======
enum SocialProviderEnum: string
{
>>>>>>> 350420cb (Check & fix styling)
    case GOOGLE = 'google';
    case AUTH0 = 'auth0';
}

<?php

declare(strict_types=1);

namespace Modules\User\Enums;

use Modules\Xot\Traits\EnumTrait;
use Filament\Support\Contracts\HasLabel;

enum LanguageEnum: string implements HasLabel
{
    use EnumTrait;

    case ITALIAN = 'it';
    case ENGLISH = 'en';
    case FRENCH = 'fr';
    case GERMAN = 'de';
    case SPANISH = 'es';
}

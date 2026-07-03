<?php

declare(strict_types=1);

namespace Modules\User\Enums\Enums;

use Modules\Xot\Traits\EnumTrait;
use Filament\Support\Contracts\HasLabel;

enum LanguageEnum: string implements HasLabel
{
    use EnumTrait;

    case ITALIAN = 'it';
    case ENGLISH = 'en';
    case SPANISH = 'es';
    case FRENCH = 'fr';
    case GERMAN = 'de';
}

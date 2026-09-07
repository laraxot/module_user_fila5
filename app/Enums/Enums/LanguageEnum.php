<?php

declare(strict_types=1);

namespace Modules\User\Enums\Enums;

use Filament\Support\Contracts\HasLabel;
<<<<<<< HEAD
<<<<<<< HEAD

enum LanguageEnum: string implements HasLabel
{
=======
=======
>>>>>>> f589f9b2 (.)
use Modules\Xot\Traits\EnumTrait;

enum LanguageEnum: string implements HasLabel
{
    use EnumTrait;

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    case ITALIAN = 'it';
    case ENGLISH = 'en';
    case SPANISH = 'es';
    case FRENCH = 'fr';
    case GERMAN = 'de';
<<<<<<< HEAD
<<<<<<< HEAD

    public function getLabel(): string
    {
        return match ($this) {
            self::ITALIAN => 'Italiano',
            self::ENGLISH => 'English',
            self::SPANISH => 'Español',
            self::FRENCH => 'Français',
            self::GERMAN => 'Deutsch',
        };
    }
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
}

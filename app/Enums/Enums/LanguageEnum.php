<?php

declare(strict_types=1);

namespace Modules\User\Enums\Enums;

use Filament\Support\Contracts\HasLabel;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
use Modules\Xot\Traits\EnumTrait;

enum LanguageEnum: string implements HasLabel
{
    use EnumTrait;

<<<<<<< HEAD
=======

enum LanguageEnum: string implements HasLabel
{
>>>>>>> f548be94 (.)
=======

enum LanguageEnum: string implements HasLabel
{
=======
use Modules\Xot\Traits\EnumTrait;

enum LanguageEnum: string implements HasLabel
{
    use EnumTrait;

>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
    case ITALIAN = 'it';
    case ENGLISH = 'en';
    case SPANISH = 'es';
    case FRENCH = 'fr';
    case GERMAN = 'de';
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 87273113 (.)

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
<<<<<<< HEAD
>>>>>>> f548be94 (.)
=======
=======
>>>>>>> 2024e2e7 (.)
>>>>>>> 87273113 (.)
=======
>>>>>>> laraxot/dev
}

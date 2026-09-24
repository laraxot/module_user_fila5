<?php

declare(strict_types=1);

namespace Modules\User\Enums;

use Filament\Support\Contracts\HasLabel;
<<<<<<< HEAD
use Modules\Xot\Traits\EnumTrait;

enum LanguageEnum: string implements HasLabel
{
    use EnumTrait;

=======

enum LanguageEnum: string implements HasLabel
{
>>>>>>> 350420cb (Check & fix styling)
    case ITALIAN = 'it';
    case ENGLISH = 'en';
    case FRENCH = 'fr';
    case GERMAN = 'de';
    case SPANISH = 'es';
<<<<<<< HEAD
=======

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
>>>>>>> 350420cb (Check & fix styling)
}

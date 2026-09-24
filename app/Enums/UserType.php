<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 350420cb (Check & fix styling)
/**
 * ---.
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 350420cb (Check & fix styling)
namespace Modules\User\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;
<<<<<<< HEAD
use Modules\Xot\Traits\EnumTrait;
=======
>>>>>>> 350420cb (Check & fix styling)

// use Datomatic\LaravelEnumHelper\LaravelEnumHelper;

enum UserType: string implements HasColor, HasIcon, HasLabel
{
<<<<<<< HEAD
    use EnumTrait;

=======
>>>>>>> 350420cb (Check & fix styling)
    // //use LaravelEnumHelper;

    case MasterAdmin = 'master_admin';
    case BoUser = 'backoffice_user';
    case CustomerUser = 'customer_user';
    case System = 'system';
    case Technician = 'technician';

<<<<<<< HEAD
    private const string API = 'api';

    private const string WEB = 'web';
=======
    private const API = 'api';

    private const WEB = 'web';
>>>>>>> 350420cb (Check & fix styling)

    public function getDefaultGuard(): string
    {
        return match ($this) {
            self::MasterAdmin, self::System, self::CustomerUser, self::BoUser => self::WEB,
            self::Technician => self::API,
        };
    }
<<<<<<< HEAD
=======

    public function getLabel(): string
    {
        return match ($this) {
            self::MasterAdmin => 'master_admin',
            self::BoUser => 'backoffice_user',
            self::CustomerUser => 'customer_user',
            self::System => 'system',
            self::Technician => 'technician',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::MasterAdmin => 'success',
            self::BoUser => 'warning',
            self::CustomerUser => 'gray',
            self::System => 'blue',
            self::Technician => 'green',
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            self::MasterAdmin => 'heroicon-m-pencil',
            self::BoUser => 'heroicon-m-pencil',
            self::CustomerUser => 'heroicon-m-pencil',
            self::System => 'heroicon-m-pencil',
            self::Technician => 'heroicon-m-pencil',
        };
    }
>>>>>>> 350420cb (Check & fix styling)
}

<?php

declare(strict_types=1);

use function Safe\define;

<<<<<<< HEAD
// use Nwidart\Modules\Contracts\RepositoryInterface;

// https://phpstan.org/user-guide/discovering-symbols

define('LARAVEL_DIR', __DIR__);

// class_alias(RepositoryInterface::class, '\Nwidart\Modules\Facades\Module');
=======
// https://phpstan.org/user-guide/discovering-symbols

if (! defined('LARAVEL_DIR')) {
    define('LARAVEL_DIR', __DIR__);
}
>>>>>>> 2024e2e7 (.)

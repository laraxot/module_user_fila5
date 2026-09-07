<?php

declare(strict_types=1);

namespace Modules\User\Exceptions;

<<<<<<< HEAD
<<<<<<< HEAD
use LogicException;

final class ProviderNotConfigured extends LogicException
{
    public static function make(string $provider): static
    {
        return new self('Provider "' .
            $provider .
            '" is not configured. tips: add ' .
            $provider .
=======
=======
>>>>>>> f589f9b2 (.)
final class ProviderNotConfigured extends \LogicException
{
    public static function make(string $provider): static
    {
        return new self('Provider "'.
            $provider.
            '" is not configured. tips: add '.
            $provider.
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            ' to config/services.php');
    }
}

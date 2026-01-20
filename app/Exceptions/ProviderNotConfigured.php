<?php

declare(strict_types=1);

namespace Modules\User\Exceptions;

<<<<<<< HEAD
final class ProviderNotConfigured extends \LogicException
{
    public static function make(string $provider): static
    {
        return new self('Provider "'.
            $provider.
            '" is not configured. tips: add '.
            $provider.
=======
use LogicException;

final class ProviderNotConfigured extends LogicException
{
    public static function make(string $provider): static
    {
        return new self('Provider "' .
            $provider .
            '" is not configured. tips: add ' .
            $provider .
>>>>>>> f548be94 (.)
            ' to config/services.php');
    }
}

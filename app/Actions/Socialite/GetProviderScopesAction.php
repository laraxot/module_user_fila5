<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

<<<<<<< HEAD
<<<<<<< HEAD
use ArrayAccess;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

class GetProviderScopesAction
{
    use QueueableAction;

    /**
     * Execute the action.
<<<<<<< HEAD
<<<<<<< HEAD
     */
    public function execute(string $provider): array
    {
        /**
         * @var array|ArrayAccess
         */
        $services = config('services');
        $scopes = Arr::get($services, $provider . '.scopes');
        if (!\is_array($scopes)) {
            return [];
        }

        return $scopes;
=======
=======
>>>>>>> f589f9b2 (.)
     *
     * @return array<int, string>
     */
    public function execute(string $provider): array
    {
        $services = config('services');
        if (! is_array($services)) {
            return [];
        }

        $scopes = Arr::get($services, $provider.'.scopes');
        if (! \is_array($scopes)) {
            return [];
        }

        return array_values(array_filter(array_map(
            static fn (mixed $scope): ?string => \is_scalar($scope) || $scope instanceof \Stringable ? (string) $scope : null,
            $scopes
        ), static fn (?string $scope): bool => null !== $scope));
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}

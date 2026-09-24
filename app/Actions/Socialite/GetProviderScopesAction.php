<?php

<<<<<<< HEAD
declare(strict_types=1);
=======
>>>>>>> 350420cb (Check & fix styling)
/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 350420cb (Check & fix styling)
namespace Modules\User\Actions\Socialite;

use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

class GetProviderScopesAction
{
    use QueueableAction;

    /**
     * Execute the action.
     *
     * @return array<int, string>
     */
    public function execute(string $provider): array
    {
<<<<<<< HEAD
        $services = config('services');
        if (! is_array($services)) {
            return [];
        }

=======
        /**
         * @var array<string, mixed>|\ArrayAccess<string, mixed>
         */
        $services = config('services');
>>>>>>> 350420cb (Check & fix styling)
        $scopes = Arr::get($services, $provider.'.scopes');
        if (! \is_array($scopes)) {
            return [];
        }

<<<<<<< HEAD
        return array_values(array_filter(array_map(
            static fn (mixed $scope): ?string => \is_scalar($scope) || $scope instanceof \Stringable ? (string) $scope : null,
            $scopes
<<<<<<< .merge_file_qrrSnF
        ), static fn (?string $scope): bool => null !== $scope));
=======
        return array_values(array_filter($scopes, 'is_string'));
>>>>>>> 350420cb (Check & fix styling)
=======
        ), static fn (?string $scope): bool => $scope !== null));
>>>>>>> .merge_file_N6dXGU
    }
}

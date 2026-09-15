<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

class GetDomainAllowListAction
{
    use QueueableAction;

    public function __construct(
        private readonly Arr $arrHelper,
<<<<<<< .merge_file_k59uvF
    ) {
    }
=======
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev
>>>>>>> .merge_file_MB4M2N

    /**
     * Execute the action.
     *
     * @return array<int, string>
     */
    public function execute(): array
    {
        $res = config('socialite.domain_allowlist', []);
        if (\is_string($res)) {
            return $this->arrHelper->wrap($res);
        }

        if (\is_array($res)) {
            return array_values(array_filter(array_map(
                static fn (mixed $item): ?string => \is_scalar($item) || $item instanceof \Stringable ? (string) $item : null,
                $res
            ), static fn (?string $item): bool => null !== $item));
        }

        return [];
    }
}

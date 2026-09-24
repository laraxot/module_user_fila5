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

class GetDomainAllowListAction
{
    use QueueableAction;

    public function __construct(
        private readonly Arr $arrHelper,
    ) {}

    /**
     * Execute the action.
<<<<<<< HEAD
     *
     * @return array<int, string>
     */
=======
     */
    /** @return array<int, string> */
>>>>>>> 350420cb (Check & fix styling)
    public function execute(): array
    {
        $res = config('socialite.domain_allowlist', []);
        if (\is_string($res)) {
            return $this->arrHelper->wrap($res);
        }

        if (\is_array($res)) {
<<<<<<< HEAD
            return array_values(array_filter(array_map(
                static fn (mixed $item): ?string => \is_scalar($item) || $item instanceof \Stringable ? (string) $item : null,
                $res
<<<<<<< .merge_file_XDMxk1
            ), static fn (?string $item): bool => null !== $item));
=======
            return array_values(array_map(static fn (mixed $item): string => (string) $item, $res));
>>>>>>> 350420cb (Check & fix styling)
=======
            ), static fn (?string $item): bool => $item !== null));
>>>>>>> .merge_file_EEREiP
        }

        return [];
    }
}

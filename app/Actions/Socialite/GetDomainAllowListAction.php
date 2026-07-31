<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Modules\Xot\Actions\Cast\SafeStringCastAction;

use Illuminate\Support\Arr;
use Spatie\QueueableAction\QueueableAction;

class GetDomainAllowListAction
{
    use QueueableAction;

    public function __construct(
        private readonly Arr $arrHelper,
    ) {
    }

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
            return array_values(array_map(
<<<<<<< .merge_file_nCmsyE
                static fn (mixed $item): string => SafeStringCastAction::cast($item),
=======
<<<<<<< HEAD
                static fn (mixed $item): string => is_string($item) ? $item : (string) $item,
=======
                static fn (mixed $item): string => SafeStringCastAction::cast($item),
>>>>>>> c5e6021c (.)
>>>>>>> .merge_file_L8ecY3
                $res
            ));
        }

        return [];
    }
}

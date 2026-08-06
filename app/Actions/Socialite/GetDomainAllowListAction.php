<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions\Socialite;

use Illuminate\Support\Arr;
<<<<<<< HEAD
use Modules\Xot\Actions\Cast\SafeStringCastAction;
=======
>>>>>>> laraxot/dev
use Spatie\QueueableAction\QueueableAction;

class GetDomainAllowListAction
{
    use QueueableAction;

    public function __construct(
        private readonly Arr $arrHelper,
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> laraxot/dev

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
<<<<<<< HEAD
                static fn (mixed $item): string => is_string($item) ? $item : SafeStringCastAction::cast($item),
=======
                static fn (mixed $item): string => is_string($item) ? $item : (string) $item,
>>>>>>> laraxot/dev
                $res
            ));
        }

        return [];
    }
}

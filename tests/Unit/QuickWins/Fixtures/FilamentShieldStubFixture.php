<?php

declare(strict_types=1);

namespace Tests\Modules\User\Unit\QuickWins\Fixtures;

/**
 * Minimal Filament Shield service stub for facade tests.
 */
final class FilamentShieldStubFixture
{
    /**
     * @return list<string>
     */
    public function getWidgets(): array
    {
        return ['w1', 'w2'];
    }
}

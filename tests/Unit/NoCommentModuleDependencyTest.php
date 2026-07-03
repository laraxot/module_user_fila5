<?php

declare(strict_types=1);

use Modules\User\Models\BaseUser;
use Symfony\Component\Finder\Finder;

it('does not reference the Comment module anywhere under User app', function (): void {
    $appPath = dirname(__DIR__, 2).'/app';

    $finder = (new Finder())
        ->files()
        ->in($appPath)
        ->name('*.php');

    $violations = [];

    foreach ($finder as $file) {
        $contents = $file->getContents();
        $relative = str_replace($appPath.'/', '', $file->getPathname());

        if (preg_match('/Modules\\\\Comment\\\\/', $contents) === 1) {
            $violations[] = $relative;
        }
    }

    expect($violations)->toBeEmpty(
        'User must not depend on Comment module. Violations: '.implode(', ', $violations)
    );
});

it('loads BaseUser without Comment traits', function (): void {
    $traits = array_map(
        static fn (ReflectionClass $trait): string => $trait->getName(),
        (new ReflectionClass(BaseUser::class))->getTraits()
    );

    foreach ($traits as $trait) {
        expect($trait)->not->toContain('Comment');
    }
});

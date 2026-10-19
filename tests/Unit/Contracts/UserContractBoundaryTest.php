<?php

declare(strict_types=1);

test('user boundaries depend on UserContract instead of BaseUser', function (): void {
    $root = dirname(__DIR__, 5);
    $paths = [
        $root.'/Modules/User/app',
        $root.'/Themes/Sixteen/app',
        $root.'/Themes/Sixteen/resources/views',
    ];

    $violations = [];
    foreach ($paths as $path) {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));
        foreach ($iterator as $file) {
            if (! $file->isFile() || ! in_array($file->getExtension(), ['php', 'blade.php'], true)) {
                continue;
            }

            $contents = file_get_contents($file->getPathname());
            if (is_string($contents) && preg_match('/instanceof\s+BaseUser\b/', $contents) === 1) {
                $violations[] = $file->getPathname();
            }
        }
    }

    expect($violations)->toBe([], 'Runtime boundaries must check UserContract, not BaseUser.');
});

<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

use function Safe\file_get_contents;



test('base user model does not use comment traits', function (): void {
    $baseUserPath = dirname(__DIR__, 2).'/app/Models/BaseUser.php';
    $contents = file_get_contents($baseUserPath);

    expect($contents)
        ->not()->toContain('HasCommentatorRelations')
        ->not()->toContain('CanComment')
        ->not()->toContain('InteractsWithComments');
});

test('user composer does not reference the comment module', function (): void {
    $composerPath = dirname(__DIR__, 2).'/composer.json';
    $contents = file_get_contents($composerPath);

    expect($contents)->not()->toContain('"../Comment"');
});

test('user app code does not import the comment module', function (): void {
    $appPath = dirname(__DIR__, 2).'/app';
    $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($appPath));

    foreach ($files as $file) {
        if ($file->getExtension() !== 'php') {
            continue;
        }

        expect(file_get_contents($file->getPathname()))->not()->toContain('Modules\\Comment\\');
    }
});

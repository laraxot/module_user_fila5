<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit;

<<<<<<< HEAD
use PHPUnit\Framework\Assert;

=======
>>>>>>> laraxot/dev
use function Safe\file_get_contents;

test('it does not reference the comment module anywhere under user app', function (): void {
    $appPath = dirname(__DIR__, 2).'/app';
    $iterator = new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator($appPath, \FilesystemIterator::SKIP_DOTS)
    );

    /** @var \SplFileInfo $file */
    foreach ($iterator as $file) {
<<<<<<< HEAD
        if (! $file->isFile() || $file->getExtension() !== 'php') {
=======
        if (! $file->isFile() || 'php' !== $file->getExtension()) {
>>>>>>> laraxot/dev
            continue;
        }

        if (str_ends_with($file->getFilename(), '.old')) {
            continue;
        }

        $contents = file_get_contents($file->getPathname());

<<<<<<< HEAD
        Assert::assertStringNotContainsString('Modules\\Comment\\', $contents);
        Assert::assertStringNotContainsString('InteractsWithComments', $contents);
        Assert::assertStringNotContainsString('HasCommentatorRelations', $contents);
=======
        expect($contents)
            ->not->toContain('Modules\\Comment\\')
            ->not->toContain('InteractsWithComments')
            ->not->toContain('HasCommentatorRelations');
>>>>>>> laraxot/dev
    }
});

test('base user model does not use comment traits', function (): void {
    $baseUserPath = dirname(__DIR__, 2).'/app/Models/BaseUser.php';
    $contents = file_get_contents($baseUserPath);

<<<<<<< HEAD
    Assert::assertStringNotContainsString('HasCommentatorRelations', $contents);
    Assert::assertStringNotContainsString('CanComment', $contents);
    Assert::assertStringNotContainsString('InteractsWithComments', $contents);
=======
    expect($contents)
        ->not->toContain('HasCommentatorRelations')
        ->not->toContain('CanComment')
        ->not->toContain('InteractsWithComments');
>>>>>>> laraxot/dev
});

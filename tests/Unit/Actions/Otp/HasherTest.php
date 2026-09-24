<?php

declare(strict_types=1);
<<<<<<< .merge_file_IY31YQ
<<<<<<< HEAD
<<<<<<< .merge_file_f6H5sK

=======
>>>>>>> .merge_file_WfmX6F
=======
<<<<<<< .merge_file_NPPnlX

use Modules\User\Actions\Otp\Hasher;
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);
=======
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_KfNAsx
use Modules\User\Actions\Otp\Hasher;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
<<<<<<< HEAD
=======
>>>>>>> .merge_file_HByJVY
>>>>>>> df2ba808 (.)

it('makes hashed value', function (): void {
    $hasher = app(Hasher::class);
    $hash = $hasher->make('test-otp-code');

    Assert::assertIsString($hash);
    Assert::assertNotSame('test-otp-code', $hash);
});

it('verifies correct value', function (): void {
    $hasher = app(Hasher::class);
    $value = 'test-otp-code';
    $hash = $hasher->make($value);

    Assert::assertTrue($hasher->check($value, $hash));
});

it('rejects incorrect value', function (): void {
    $hasher = app(Hasher::class);
    $hash = $hasher->make('correct-code');

    Assert::assertFalse($hasher->check('wrong-code', $hash));
});

it('checks if rehash is needed', function (): void {
    $hasher = app(Hasher::class);
    $hash = $hasher->make('test-code');

    Assert::assertIsBool($hasher->needsRehash($hash));
});

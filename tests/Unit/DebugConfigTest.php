<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\User\Tests\TestCase;
=======
use Illuminate\Support\Facades\DB;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;
>>>>>>> bc04202a (fix(user): risolti 746 file con marker di conflitto merge mai puliti in HEAD)

uses(TestCase::class);

test('verify database connections config', function () {
    // Verify that the database config is loaded and valid
    $config = config('database.connections');
    expect($config)->toBeArray()
        ->and($config)->not->toBeEmpty();
});

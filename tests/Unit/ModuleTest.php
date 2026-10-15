<?php
namespace Modules\User\Tests\Unit;

use Modules\User\Tests\TestCase;
use Modules\User\Models\User;

it('has main model class', function () {
    expect(class_exists(User::class))->toBeTrue();
});

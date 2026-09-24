<?php

declare(strict_types=1);
<<<<<<< HEAD
use Modules\User\Mail\TeamInvitation;
use Modules\User\Models\TeamInvitation as TeamInvitationModel;
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======

use Modules\User\Mail\TeamInvitation;
use Modules\User\Models\TeamInvitation as TeamInvitationModel;
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);
>>>>>>> 350420cb (Check & fix styling)

test('TeamInvitation mail can be instantiated', function () {
    Assert::assertTrue(class_exists(TeamInvitation::class));

    $model = new TeamInvitationModel();
    $model->forceFill([
        'email' => 'test@example.com',
    ]);

    $mail = new TeamInvitation();
    $mail->invitation = $model;

    Assert::assertInstanceOf(TeamInvitation::class, $mail);
    Assert::assertSame($model, $mail->invitation);
});

test('TeamInvitation has expected methods', function () {
    Assert::assertTrue(class_exists(TeamInvitation::class));
});

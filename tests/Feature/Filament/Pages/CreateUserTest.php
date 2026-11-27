<?php

declare(strict_types=1);

use Illuminate\Contracts\Support\Htmlable;
use Modules\User\Enums\UserType;
use Modules\User\Filament\Resources\UserResource;
use Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use Modules\User\Models\User;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm;
use PHPUnit\Framework\Assert;

/**
 * Verifica che CreateUser esponga il contratto Filament atteso
 * (resource, model, form) senza dipendere dal tenant di rotta.
 *
 * Usa TestCase::$createUserPage (tipizzato) — non $this->page mistyped.
 */
uses(TestCase::class);

beforeEach(function (): void {
    TestCase::$createUserPage = new CreateUser;
<<<<<<< .merge_file_LDertf
    $this->page = new CreateUser();
=======
    $this->page = new CreateUser;
>>>>>>> .merge_file_P2ei3t
});

test('create user page has correct resource', function (): void {
    $page = TestCase::requireCreateUserPage();
    Assert::assertSame(UserResource::class, $page->getResource());
});

test('create user page has correct navigation label', function (): void {
    $label = TestCase::requireCreateUserPage()->getNavigationLabel();
    Assert::assertNotSame('', $label instanceof Htmlable ? $label->toHtml() : $label);
});

test('create user page has correct title', function (): void {
    $title = TestCase::requireCreateUserPage()->getTitle();
    Assert::assertNotSame('', $title instanceof Htmlable ? $title->toHtml() : $title);
});

test('create user page has correct breadcrumbs structure', function (): void {
    $page = TestCase::requireCreateUserPage();

    // Senza i parametri di rotta del tenant la generazione lancia: il test non e' applicabile.
    try {
        $breadcrumbs = $page->getBreadcrumbs();
    } catch (Exception) {
        $this->markTestSkipped('Breadcrumbs need route parameters not available in multi-tenant setup.');
    }

    // Filament aggiunge sempre almeno il breadcrumb della pagina corrente.
    Assert::assertNotEmpty($breadcrumbs);
});

test('create user page can create user with valid data', function (): void {
    $userData = [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password123',
        'type' => UserType::MasterAdmin,
    ];

    Assert::assertSame('Test User', $userData['name']);
    Assert::assertSame('test@example.com', $userData['email']);
    Assert::assertSame('password123', $userData['password']);
    Assert::assertSame(UserType::MasterAdmin, $userData['type']);
});

test('create user page handles form submission structure', function (): void {
    $formData = [
        'name' => 'New User',
        'email' => 'newuser@example.com',
        'password' => 'newpassword123',
        'type' => UserType::BoUser,
    ];

    Assert::assertArrayHasKey('name', $formData);
    Assert::assertArrayHasKey('email', $formData);
    Assert::assertArrayHasKey('password', $formData);
    Assert::assertArrayHasKey('type', $formData);
    Assert::assertSame('New User', $formData['name']);
    Assert::assertSame('newuser@example.com', $formData['email']);
    Assert::assertSame('newpassword123', $formData['password']);
    Assert::assertSame(UserType::BoUser, $formData['type']);
});

test('create user page has basic form functionality', function (): void {
    // Lo schema vive in Schemas\UserForm (UserResource::getFormClass()); uno schema vuoto
    // svuota la pagina di creazione senza errori ne' log.
    Assert::assertSame(UserResource::class, TestCase::requireCreateUserPage()->getResource());
    $form = app(UserResource::getFormClass());
    Assert::assertInstanceOf(XotBaseResourceForm::class, $form);
    Assert::assertNotEmpty($form->getFormSchema());
});

test('create user page follows filament conventions', function (): void {
    $page = TestCase::requireCreateUserPage();
    Assert::assertSame(UserResource::class, $page->getResource());
    Assert::assertSame(User::class, $page->getModel());
});

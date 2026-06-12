<?php

declare(strict_types=1);

namespace Modules\User\Tests\Feature;

use Modules\User\Datas\PasswordData;
use Modules\User\Tests\TestCase;

class PasswordDataLabelsTest extends TestCase
{
    public function test_password_data_labels_are_translated(): void
    {
        app()->setLocale('it');

        $passwordData = PasswordData::make();
        $passwordData->setFieldName('password');

        $passwordComponent = $passwordData->getPasswordFormComponent('password');
        $confirmationComponent = $passwordData->getPasswordConfirmationFormComponent();

        $this->assertSame('Parola d\'ordine', $passwordComponent->getLabel());
        $this->assertSame('Conferma Password', $confirmationComponent->getLabel());
    }

    public function test_login_form_labels_are_translated(): void
    {
        $this->markTestSkipped('Login Livewire form labels — coperto da widget Filament LoginWidgetTest');
    }
}

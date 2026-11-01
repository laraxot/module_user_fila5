<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Password;
use Modules\User\Filament\Widgets\Auth\Schemas\UserForm;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * ForgotPasswordWidget — invio link reset via email.
 *
 * Schema da `Schemas\UserForm::getForgotPasswordFormSchema()` — SSoT.
 *
 * @property Schema $form
 */
class ForgotPasswordWidget extends XotBaseSchemaWidget
{
    /**
     * @return class-string<UserForm>
     */
    protected static function formClass(): string
    {
        return UserForm::class;
    }

    protected static function schemaMethod(): string
    {
        return 'getForgotPasswordFormSchema';
    }

    /** Vero dopo un invio valido: la vista mostra l'esito neutro in `role="status"`. */
    public bool $sent = false;

    /**
     * Risposta identica per indirizzo registrato, sconosciuto o richiesta frenata dal broker: chi non e' loggato non deve poter
     * scoprire quali email hanno un account (DCP-290, FO-3-01). L'esito di `Password::sendResetLink` non si mostra mai.
     */
    public function sendResetLink(): void
    {
        /** @var array<string, mixed> $data */
        $data = $this->form->getState();
        $email = is_string($data['email'] ?? null) ? $data['email'] : '';

        Password::sendResetLink(['email' => $email]);

        $this->sent = true;
        $this->form->fill();
    }
}

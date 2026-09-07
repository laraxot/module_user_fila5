<?php

declare(strict_types=1);

namespace Modules\User\Rules;

<<<<<<< HEAD
<<<<<<< HEAD
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Modules\User\Datas\PasswordData;
use Modules\User\Models\User;
=======
=======
>>>>>>> f589f9b2 (.)
use Illuminate\Contracts\Validation\ValidationRule;
use Modules\User\Datas\PasswordData;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

/**
 * Regola di validazione per verificare se un codice OTP è scaduto.
 */
class CheckOtpExpiredRule implements ValidationRule
{
    private string $message = 'Il codice OTP è scaduto. Richiedi un nuovo codice.';

    public function __construct(
        private User $user,
<<<<<<< HEAD
<<<<<<< HEAD
    ) {}
=======
    ) {
    }
>>>>>>> 2024e2e7 (.)
=======
    ) {
    }
>>>>>>> f589f9b2 (.)

    /**
     * Run the validation rule.
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function validate(string $_attribute, mixed $_value, Closure $fail): void
    {
        if ($this->user->updated_at === null) {
            $fail($this->message);
=======
=======
>>>>>>> f589f9b2 (.)
    public function validate(string $_attribute, mixed $_value, \Closure $fail): void
    {
        if (null === $this->user->updated_at) {
            $fail($this->message);

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            return;
        }

        $pwd_data = PasswordData::make();
        $otpExpirationMinutes = $pwd_data->otp_expiration_minutes;
        $otp_expires_at = $this->user->updated_at->addMinutes($otpExpirationMinutes);

        if (now()->greaterThan($otp_expires_at)) {
            $fail($this->message);
        }
    }

    /**
     * Ottiene il messaggio di errore da visualizzare.
     *
     * @return string Il messaggio di errore
     */
    public function message(): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return __('user::otp.notifications.otp_expired.body');
=======
        return SafeStringCastAction::cast(__('user::otp.notifications.otp_expired.body'));
>>>>>>> 2024e2e7 (.)
=======
        return SafeStringCastAction::cast(__('user::otp.notifications.otp_expired.body'));
>>>>>>> f589f9b2 (.)
    }
}

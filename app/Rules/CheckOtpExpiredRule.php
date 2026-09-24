<?php

declare(strict_types=1);

namespace Modules\User\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
<<<<<<< HEAD
use Illuminate\Support\Carbon;
use Modules\User\Datas\PasswordData;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Datas\PasswordData;
use Modules\User\Models\User;
use Modules\Xot\Actions\Cast\SafeStringCastAction;
>>>>>>> 350420cb (Check & fix styling)

/**
 * Regola di validazione per verificare se un codice OTP è scaduto.
 */
class CheckOtpExpiredRule implements ValidationRule
{
    private string $message = 'Il codice OTP è scaduto. Richiedi un nuovo codice.';

    public function __construct(
<<<<<<< HEAD
        private UserContract $user,
=======
        private User $user,
>>>>>>> 350420cb (Check & fix styling)
    ) {
    }

    /**
     * Run the validation rule.
<<<<<<< HEAD
     *
     * @param mixed $_value value under validation; `mixed` is required by the
     *                      ValidationRule vendor contract and stays unused here
     */
    public function validate(string $_attribute, mixed $_value, \Closure $fail): void
    {
        $updatedAt = $this->user->getAttribute('updated_at');
        if (! $updatedAt instanceof Carbon) {
=======
     */
    public function validate(string $_attribute, mixed $_value, \Closure $fail): void
    {
        if (null === $this->user->updated_at) {
>>>>>>> 350420cb (Check & fix styling)
            $fail($this->message);

            return;
        }

        $pwd_data = PasswordData::make();
        $otpExpirationMinutes = $pwd_data->otp_expiration_minutes;
<<<<<<< HEAD
        $otp_expires_at = $updatedAt->addMinutes($otpExpirationMinutes);
=======
        $otp_expires_at = $this->user->updated_at->addMinutes($otpExpirationMinutes);
>>>>>>> 350420cb (Check & fix styling)

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
        return SafeStringCastAction::cast(__('user::otp.notifications.otp_expired.body'));
    }
}

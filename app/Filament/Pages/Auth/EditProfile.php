<?php

declare(strict_types=1);

namespace Modules\User\Filament\Pages\Auth;

<<<<<<< HEAD
use Filament\Schemas\Components\Component;
=======
>>>>>>> 350420cb (Check & fix styling)
use Modules\User\Datas\PasswordData;
use Modules\Xot\Filament\Pages\Auth\XotBaseEditProfile;

class EditProfile extends XotBaseEditProfile
{
    public static ?string $title = 'Profilo Utente';

    /**
     * Costruisce il form schema per la pagina di modifica profilo.
<<<<<<< HEAD
     *
     * @return array<int|string, Component>
     */
=======
     */
    /** @return array<int|string, mixed> */
>>>>>>> 350420cb (Check & fix styling)
    public function getFormSchema(): array
    {
        return [
            $this->getNameFormComponent(),
            $this->getEmailFormComponent(),
            ...PasswordData::make()->getPasswordFormComponents('new_password'),
        ];
    }
}

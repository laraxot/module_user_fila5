<?php

declare(strict_types=1);
<<<<<<< .merge_file_GF9N1m
<<<<<<< HEAD
<<<<<<< .merge_file_ifptes

=======
>>>>>>> .merge_file_tg11Fc
=======
<<<<<<< .merge_file_Poffkd

=======
<<<<<<< .merge_file_fVepzG

=======
>>>>>>> .merge_file_3ycxn1
>>>>>>> .merge_file_VGNj70
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_P0WXUZ
/*
 * Chiavi lette da Modules\Xot\Traits\EnumTrait tramite TransTrait::transClass():
 * la chiave e' `<modulo>::<snake(NomeClasse)>.values.<valore>.<attributo>`.
 * Il suffisso `Enum` NON viene rimosso dal nome del file: vedi
 * TransTrait::getKeyTransClass(). Senza queste voci getLabel()/getColor()/getIcon()
 * restituiscono la stringa 'fix:<chiave>', che finisce a video.
 */

return [
    'values' => [
        'google' => [
            'label' => 'Google',
            'color' => 'danger',
            'icon' => 'heroicon-o-globe-alt',
            'description' => 'Accesso con account Google',
        ],
        'auth0' => [
            'label' => 'Auth0',
            'color' => 'warning',
            'icon' => 'heroicon-o-key',
            'description' => 'Accesso tramite Auth0',
        ],
    ],
];

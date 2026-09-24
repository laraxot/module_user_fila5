<?php

declare(strict_types=1);
<<<<<<< .merge_file_KNynh3
<<<<<<< HEAD
<<<<<<< .merge_file_JHsiks

=======
>>>>>>> .merge_file_old56E
=======
<<<<<<< .merge_file_SXyGde

=======
<<<<<<< .merge_file_5UxB3I

=======
>>>>>>> .merge_file_as7GSY
>>>>>>> .merge_file_5qNpSQ
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_BaLud3
/*
 * Chiavi lette da Modules\Xot\Traits\EnumTrait tramite TransTrait::transClass():
 * la chiave e' `<modulo>::<snake(NomeClasse)>.values.<valore>.<attributo>`.
 * Il suffisso `Enum` NON viene rimosso dal nome del file: vedi
 * TransTrait::getKeyTransClass(). Senza queste voci getLabel()/getColor()/getIcon()
 * restituiscono la stringa 'fix:<chiave>', che finisce a video.
 */

return [
    'values' => [
        'it' => [
            'label' => 'Italiano',
            'color' => 'success',
            'icon' => 'heroicon-o-language',
            'description' => 'Lingua italiana',
        ],
        'en' => [
            'label' => 'Inglese',
            'color' => 'info',
            'icon' => 'heroicon-o-language',
            'description' => 'Lingua inglese',
        ],
        'fr' => [
            'label' => 'Francese',
            'color' => 'info',
            'icon' => 'heroicon-o-language',
            'description' => 'Lingua francese',
        ],
        'de' => [
            'label' => 'Tedesco',
            'color' => 'info',
            'icon' => 'heroicon-o-language',
            'description' => 'Lingua tedesca',
        ],
        'es' => [
            'label' => 'Spagnolo',
            'color' => 'info',
            'icon' => 'heroicon-o-language',
            'description' => 'Lingua spagnola',
        ],
    ],
];

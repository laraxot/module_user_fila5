<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits\Fixtures;

use Modules\User\Models\User;
use Modules\User\Tests\Traits\HasUserTestCase;

final class HasUserTestCaseFixture
{
    // La proprietà `$user` arriva dal trait, che la dichiara `protected User $user`.
    // Ridichiararla qui come `public` è una composizione incompatibile: PHP muore con
    // «define the same property ($user) … the definition differs», e il fatale ferma
    // l'intera suite del modulo, non solo questo file.
    use HasUserTestCase;

    public function __construct()
    {
        $this->user = new User();
    }
}

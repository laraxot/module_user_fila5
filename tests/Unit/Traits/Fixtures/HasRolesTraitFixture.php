<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Traits\Fixtures;

use Modules\User\Models\Traits\HasRoles;
use Modules\Xot\Models\BaseModel;
<<<<<<< HEAD
use Modules\Xot\Models\Traits\RelationX;
=======
>>>>>>> laraxot/dev

/** PHPStan fixture: keeps custom HasRoles trait in analysed graph. */
final class HasRolesTraitFixture extends BaseModel
{
    use HasRoles;
<<<<<<< HEAD
    use RelationX;
=======
>>>>>>> laraxot/dev

    protected $table = 'model_has_roles';
}

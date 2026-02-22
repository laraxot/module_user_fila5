<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Traits\HasTeams;
<<<<<<< HEAD
use Modules\Xot\Models\Traits\RelationX;
use Modules\User\Models\User;
=======
>>>>>>> 60a2c9a9 (.)

/**
 * Modello di supporto per i test del trait HasTeams.
 */
class MockUserWithTeams extends Model
{
    use HasTeams;
<<<<<<< HEAD
    use RelationX;
=======
>>>>>>> 60a2c9a9 (.)

    protected $table = 'users';

    protected $fillable = ['name', 'email'];

    public function getKey(): int
    {
        return 1;
    }
}

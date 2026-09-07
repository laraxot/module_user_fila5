<?php

declare(strict_types=1);

namespace Modules\User\Tests\Unit\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Modules\User\Models\Traits\HasTeams;
<<<<<<< HEAD
<<<<<<< HEAD
=======
use Modules\Xot\Models\Traits\RelationX;
>>>>>>> 2024e2e7 (.)
=======
use Modules\Xot\Models\Traits\RelationX;
>>>>>>> f589f9b2 (.)

/**
 * Modello di supporto per i test del trait HasTeams.
 */
class MockUserWithTeams extends Model
{
    use HasTeams;
<<<<<<< HEAD
<<<<<<< HEAD
=======
    use RelationX;
>>>>>>> 2024e2e7 (.)
=======
    use RelationX;
>>>>>>> f589f9b2 (.)

    protected $table = 'users';

    protected $fillable = ['name', 'email'];

    public function getKey(): int
    {
        return 1;
    }
}

<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\Pivot;
=======
>>>>>>> 60a2c9a9 (.)
use Modules\User\Models\Device;

trait HasDevices
{
<<<<<<< HEAD
    /**
     * @return BelongsToMany<Device, $this, Pivot>
     */
=======
>>>>>>> 60a2c9a9 (.)
    public function devices(): BelongsToMany
    {
        return $this->belongsToManyX(Device::class);
    }
}

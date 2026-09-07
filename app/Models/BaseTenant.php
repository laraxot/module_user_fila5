<?php

declare(strict_types=1);

namespace Modules\User\Models;

<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Database\Factories\TenantFactory;
use Illuminate\Database\Eloquent\Builder;
use Modules\Xot\Contracts\ProfileContract;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Modules\User\Contracts\TenantContract;
=======
=======
>>>>>>> f589f9b2 (.)
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\User\Contracts\TenantContract;
use Modules\Xot\Contracts\ProfileContract;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Datas\XotData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Modules\User\Models\Tenant.
 *
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static TenantFactory factory($count = null, $state = [])
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
 * @method static Builder|Tenant newModelQuery()
 * @method static Builder|Tenant newQuery()
 * @method static Builder|Tenant query()
 *
 * @property EloquentCollection<int, Model&UserContract> $members
 * @property int|null $members_count
 * @property ProfileContract|null $creator
 * @property ProfileContract|null $updater
 *
 * @mixin \Eloquent
 */
abstract class BaseTenant extends BaseModel implements HasAvatar, HasMedia, TenantContract
{
    use HasSlug;
    use InteractsWithMedia;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> f589f9b2 (.)
    public $incrementing = false;

    protected $keyType = 'string';

<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    /** @var list<string> */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'email_address',
        'phone',
        'mobile',
        'address',
        'primary_color',
        'secondary_color',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('name')->saveSlugsTo('slug');
    }

    /**
     * Ottiene tutti i membri associati al tenant.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return BelongsToMany<Model, \Modules\User\Models\BaseTenant>
=======
     * @return BelongsToMany<Model, $this, Pivot, 'pivot'>
>>>>>>> 2024e2e7 (.)
=======
     * @return BelongsToMany<Model, $this, Pivot, 'pivot'>
>>>>>>> f589f9b2 (.)
     */
    public function members(): BelongsToMany
    {
        /** @var class-string<Model> $user_class */
        $user_class = XotData::make()->getUserClass();

        return $this->belongsToManyX($user_class);
    }

    /**
     * Ottiene tutti gli utenti associati al tenant.
     *
<<<<<<< HEAD
<<<<<<< HEAD
     * @return BelongsToMany<Model, \Modules\User\Models\BaseTenant>
=======
     * @return BelongsToMany<Model, $this, Pivot, 'pivot'>
>>>>>>> 2024e2e7 (.)
=======
     * @return BelongsToMany<Model, $this, Pivot, 'pivot'>
>>>>>>> f589f9b2 (.)
     */
    public function users(): BelongsToMany
    {
        $xot = XotData::make();
        /** @var class-string<Model> $userClass */
        $userClass = $xot->getUserClass();

        // $this->setConnection('mysql');
<<<<<<< HEAD
<<<<<<< HEAD
        //return $this->belongsToManyX($userClass, null, 'tenant_id', 'user_id');
=======
        // return $this->belongsToManyX($userClass, null, 'tenant_id', 'user_id');
>>>>>>> 2024e2e7 (.)
=======
        // return $this->belongsToManyX($userClass, null, 'tenant_id', 'user_id');
>>>>>>> f589f9b2 (.)
        return $this->belongsToManyX($userClass);

        // ->as('membership')
    }

    /**
     * Ottiene l'URL dell'avatar del tenant per Filament.
     *
     * @return string|null URL dell'avatar o null se non presente
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function getFilamentAvatarUrl(): null|string
=======
    public function getFilamentAvatarUrl(): ?string
>>>>>>> 2024e2e7 (.)
=======
    public function getFilamentAvatarUrl(): ?string
>>>>>>> f589f9b2 (.)
    {
        // return $this->avatar_url;
        return $this->getFirstMediaUrl('avatar');
    }

    // public function getSlugAttribute(?string $value): ?string
    // {
    //     if(is_string($value) || $this->getKey() == null) {
    //         return $value;
    //     }
    //     $slug = Str::slug($this->name);
    //     $this->slug = $slug;
    //     $this->save();
    //     return $slug;
    // }
}

<?php

declare(strict_types=1);

namespace Modules\User\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Modules\User\Contracts\HasProfilePhotoContract.
 *
 * @phpstan-require-extends Model
 */
interface HasProfilePhotoContract
{
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function getFilamentAvatarUrl(): ?string;

    /**
     * Update the user's profile photo.
     */
    public function updateProfilePhoto(?string $photo): void;

    /**
     * Delete the user's profile photo.
     */
    public function deleteProfilePhoto(): void;

    /**
     * Get the URL to the user's profile photo.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function getProfilePhotoUrlAttribute(): string;

    /**
     * Determine if the image file exists.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
    public function photoExists(): bool;

    /**
     * @return mixed
     */
=======
    public function photoExists(): bool;

>>>>>>> d33e3c69 (.)
    public function filamentDefaultAvatar(): string;

    /**
     * Get the disk that profile photos should be stored on.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function profilePhotoDisk(): string;

    /**
     * Get the directory that profile photos should be stored on.
     */
<<<<<<< HEAD
    /**
     * @return mixed
     */
=======
>>>>>>> d33e3c69 (.)
    public function profilePhotoDirectory(): string;
}

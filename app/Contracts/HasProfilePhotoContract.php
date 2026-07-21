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
    /**
     * @return mixed
     */
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
    /**
     * @return mixed
     */
    public function getProfilePhotoUrlAttribute(): string;

    /**
     * Determine if the image file exists.
     */
    /**
     * @return mixed
     */
    public function photoExists(): bool;

    /**
     * @return mixed
     */
    public function filamentDefaultAvatar(): string;

    /**
     * Get the disk that profile photos should be stored on.
     */
    /**
     * @return mixed
     */
    public function profilePhotoDisk(): string;

    /**
     * Get the directory that profile photos should be stored on.
     */
    /**
     * @return mixed
     */
    public function profilePhotoDirectory(): string;
}

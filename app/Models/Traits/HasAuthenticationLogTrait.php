<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> f589f9b2 (.)
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Carbon;
use Modules\User\Models\AuthenticationLog;

/**
 * Trait HasAuthenticationLogTrait.
 *
 * This trait provides functionality for logging authentication events for any model that uses it.
 * It includes methods for retrieving the latest authentication logs, login timestamps, IP addresses,
 * and other related information, including tracking consecutive login days.
 *
 * @property MorphMany<AuthenticationLog, $this> $authentications      The authentication logs related to the model.
 * @property MorphOne<AuthenticationLog, $this>  $latestAuthentication The most recent authentication log entry.
<<<<<<< HEAD
<<<<<<< HEAD
 * @property-read string|null $login_at The timestamp of the last login.
 * @property-read string|null $ip_address The IP address of the last login.
 * @property MorphMany<AuthenticationLog> $authentications
 * @property MorphOne<AuthenticationLog> $latestAuthentication
 * @property Carbon|null $login_at
 * @property string|null $ip_address
=======
 * @property string|null                         $login_at             The timestamp of the last login.
 * @property string|null                         $ip_address           The IP address of the last login.
>>>>>>> 2024e2e7 (.)
=======
 * @property string|null                         $login_at             The timestamp of the last login.
 * @property string|null                         $ip_address           The IP address of the last login.
>>>>>>> f589f9b2 (.)
 */
trait HasAuthenticationLogTrait
{
    /**
     * Get all of the model's authentication logs.
     *
     * @return MorphMany<AuthenticationLog, $this>
     */
    public function authentications(): MorphMany
    {
<<<<<<< HEAD
<<<<<<< HEAD
        return $this->morphMany(AuthenticationLog::class, 'authenticatable')->latest('login_at');
=======
        return $this->morphMany(AuthenticationLog::class, 'authenticatable');
>>>>>>> 2024e2e7 (.)
=======
        return $this->morphMany(AuthenticationLog::class, 'authenticatable');
>>>>>>> f589f9b2 (.)
    }

    /**
     * Get the latest authentication attempt for the model.
     *
     * @return MorphOne<AuthenticationLog, $this>
     */
    public function latestAuthentication(): MorphOne
    {
        return $this->morphOne(AuthenticationLog::class, 'authenticatable')->latestOfMany('login_at');
    }

    /**
     * Specify how to notify about authentication logs.
     *
     * @return list<string> a list of notification channels
     */
    public function notifyAuthenticationLogVia(): array
    {
        return ['mail'];
    }

    /**
     * Get the timestamp of the most recent login attempt.
     *
     * @return ?Carbon the timestamp of the last login or null if none exists
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function lastLoginAt(): null|Carbon
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->first();
        return $auth !== null ? $auth->login_at : null;
=======
=======
>>>>>>> f589f9b2 (.)
    public function lastLoginAt(): ?Carbon
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->first();

        return null !== $auth ? $auth->login_at : null;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Get the timestamp of the most recent successful login attempt.
     *
     * @return ?Carbon the timestamp of the last successful login or null if none exists
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function lastSuccessfulLoginAt(): null|Carbon
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->where('login_successful', true)->first();
        return $auth !== null ? $auth->login_at : null;
=======
=======
>>>>>>> f589f9b2 (.)
    public function lastSuccessfulLoginAt(): ?Carbon
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->where('login_successful', true)->first();

        return null !== $auth ? $auth->login_at : null;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Get the IP address of the most recent login attempt.
     *
     * @return ?string the IP address of the last login or null if none exists
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function lastLoginIp(): null|string
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->first();
        return $auth !== null ? $auth->ip_address : null;
=======
=======
>>>>>>> f589f9b2 (.)
    public function lastLoginIp(): ?string
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->first();

        return null !== $auth ? $auth->ip_address : null;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Get the IP address of the most recent successful login attempt.
     *
     * @return ?string the IP address of the last successful login or null if none exists
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function lastSuccessfulLoginIp(): null|string
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->where('login_successful', true)->first();
        return $auth !== null ? $auth->ip_address : null;
=======
=======
>>>>>>> f589f9b2 (.)
    public function lastSuccessfulLoginIp(): ?string
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->where('login_successful', true)->first();

        return null !== $auth ? $auth->ip_address : null;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Get the timestamp of the second most recent login attempt (previous login).
     *
     * @return ?Carbon the timestamp of the previous login or null if less than two logins exist
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function previousLoginAt(): null|Carbon
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->skip(1)->first();
        return $auth !== null ? $auth->login_at : null;
=======
=======
>>>>>>> f589f9b2 (.)
    public function previousLoginAt(): ?Carbon
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->skip(1)->first();

        return null !== $auth ? $auth->login_at : null;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Get the IP address of the second most recent login attempt (previous login).
     *
     * @return ?string the IP address of the previous login or null if less than two logins exist
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public function previousLoginIp(): null|string
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->skip(1)->first();
        return $auth !== null ? $auth->ip_address : null;
=======
=======
>>>>>>> f589f9b2 (.)
    public function previousLoginIp(): ?string
    {
        /** @var AuthenticationLog|null $auth */
        $auth = $this->authentications()->skip(1)->first();

        return null !== $auth ? $auth->ip_address : null;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Calculate the number of consecutive days the user has logged in.
     *
     * @return int the number of consecutive days the user has logged in
     */
    public function consecutiveDaysLogin(): int
    {
        return once(function (): int {
            $date = Carbon::now();
            $days = 0;

            // Count the logins for the current day.
            $count = $this->authentications()->whereDate('login_at', $date)->count();

            while ($count > 0) {
                $date = $date->subDay();
                $count = $this->authentications()->whereDate('login_at', $date)->count();
<<<<<<< HEAD
<<<<<<< HEAD
                $days++;
=======
                ++$days;
>>>>>>> 2024e2e7 (.)
=======
                ++$days;
>>>>>>> f589f9b2 (.)
            }

            return $days;
        });
    }
}

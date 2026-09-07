<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Datas;

<<<<<<< HEAD
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> 2024e2e7 (.)
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> f589f9b2 (.)
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Spatie\LaravelData\Data;
use Webmozart\Assert\Assert;

/**
 * Undocumented class.
 */
class DeviceData extends Data
{
    /*
     * case ApplicationVersion = 'X-App-Version';
     * case Application = 'X-Application';
     * case DeviceId = 'X-Device-Id';
     * case NotificationCode = 'X-Notification-Code';
     * case OperatingSystem = 'X-Operating-System';
     * case SynchronizationId = 'X-Synchronization-Identifier';
     */
<<<<<<< HEAD
<<<<<<< HEAD
    public null|string $appVersion = null;

    // = 'X-App-Version';
    public null|string $application = null;

    // = 'X-Application';
    public null|string $deviceId = null;

    // = 'X-Device-Id';
    public null|string $notificationCode = null;

    // = 'X-Notification-Code';
    public null|string $operatingSystem = null;

    // = 'X-Operating-System';
    public null|string $synchronizationId = null; // = 'X-Synchronization-Identifier';

    public static function make(): self
    {
        $headers = collect(request()->header())->mapWithKeys(static function ($item, $key): array {
            if (Str::startsWith($key, 'X-')) {
                // $key = Str::afterFirst($key, 'X-');
                $key = Str::after($key, 'X-');
            }

            $key = Str::camel($key);

            return [$key => $item];
        })->all();
=======
=======
>>>>>>> f589f9b2 (.)
    public ?string $appVersion = null;

    // = 'X-App-Version';
    public ?string $application = null;

    // = 'X-Application';
    public ?string $deviceId = null;

    // = 'X-Device-Id';
    public ?string $notificationCode = null;

    // = 'X-Notification-Code';
    public ?string $operatingSystem = null;

    // = 'X-Operating-System';
    public ?string $synchronizationId = null; // = 'X-Synchronization-Identifier';

    public static function make(): self
    {
        $headers = collect(request()->header())->mapWithKeys(
            /**
             * @param  array<int, string|null>  $item
             */
            static function (array $item, string $key): array {
                if (Str::startsWith($key, 'X-')) {
                    // $key = Str::afterFirst($key, 'X-');
                    $key = Str::after($key, 'X-');
                }

                $key = Str::camel($key);

                return [$key => $item];
            }
        )->all();
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        return self::from($headers);
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getSynchronizationId(string $apiName): string
    {
<<<<<<< HEAD
<<<<<<< HEAD
        if ($this->synchronizationId !== null) {
=======
        if (null !== $this->synchronizationId) {
>>>>>>> 2024e2e7 (.)
=======
        if (null !== $this->synchronizationId) {
>>>>>>> f589f9b2 (.)
            return $this->synchronizationId;
        }

        $synchronizationClass = config('morph_map.synchronization');
<<<<<<< HEAD
<<<<<<< HEAD
        if ($synchronizationClass === null) {
=======
        if (null === $synchronizationClass) {
>>>>>>> 2024e2e7 (.)
=======
        if (null === $synchronizationClass) {
>>>>>>> f589f9b2 (.)
            $synchronizationClass = '\Modules\Egea\Models\Synchronization';
        }

        // fare contract
        // Assert::isInstanceOf($synchronizationClass,Model::class,'['.__LINE__.']['.class_basename($this).']');
        // $synchronization = Synchronization::create([
<<<<<<< HEAD
<<<<<<< HEAD
        /**
         * @phpstan-ignore staticMethod.nonObject
         */
=======
        /** @var class-string<Model> $synchronizationClass */
        /** @var Model $synchronization */
>>>>>>> 2024e2e7 (.)
=======
        /** @var class-string<Model> $synchronizationClass */
        /** @var Model $synchronization */
>>>>>>> f589f9b2 (.)
        $synchronization = $synchronizationClass::create([
            // $synchronization = Synchronization::create([
            'user_id' => auth()->id(),
            'mobile_device_id' => $this->deviceId,
            'application' => $this->application ?? 'No-Set',
            'application_version' => $this->appVersion ?? 'No-Set',
            'api_name' => $apiName,
            'called_at' => Carbon::now(),
            // fulfilled_at
        ]);
<<<<<<< HEAD
<<<<<<< HEAD
        Assert::string($synchronizationId = $synchronization->id, __FILE__ . ':' . __LINE__ . ' - ' . class_basename(__CLASS__));
        $this->synchronizationId = $synchronizationId;
=======
=======
>>>>>>> f589f9b2 (.)
        Assert::object($synchronization);

        $syncId = $synchronization->getAttribute('id');
        Assert::string($syncId, __FILE__.':'.__LINE__.' - '.class_basename(self::class));
        $this->synchronizationId = $syncId;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)

        return $this->synchronizationId;
    }

    /*
     * public function getModel(){
     * MobileDevice::firstOrCreate();
     * }
     */
}

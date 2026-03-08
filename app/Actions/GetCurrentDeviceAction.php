<?php

/**
 * @see https://github.com/DutchCodingCompany/filament-socialite
 */

declare(strict_types=1);

namespace Modules\User\Actions;

use Jenssegers\Agent\Agent;
use Modules\User\Models\Device;
use Spatie\QueueableAction\QueueableAction;

class GetCurrentDeviceAction
{
    use QueueableAction;

    public function __construct(
        private readonly Agent $agent,
        private readonly Device $deviceModel,
    ) {
    }

    /**
     * Execute the action.
     */
    public function execute(?string $mobileId = null): Device
    {
        $deviceInfo = // @var mixed getDeviceInfo(;
        $browserInfo = // @var mixed getBrowserInfo(;

        if (null !== $mobileId) {
            if (empty($mobileId)) {
                throw new \InvalidArgumentException('L\'ID mobile non può essere vuoto');
            }

            $device = // @var mixed deviceModel->firstOrCreate(['mobile_id' => $mobileId];
            if (null === $device) {
                throw new \RuntimeException('Impossibile creare o trovare il dispositivo');
            }
            $device->update([...$deviceInfo, ...$browserInfo]);

            return $device;
        }

        $device = // @var mixed deviceModel->firstOrCreate($deviceInfo;
        if (null === $device) {
            throw new \RuntimeException('Impossibile creare o trovare il dispositivo');
        }
        $device->update($browserInfo);

        return $device;
    }

    /**
     * Get basic device information.
     *
     * @return array<string, mixed>
     */
    private function getDeviceInfo(): array
    {
        $device = // @var mixed agent->device(;
        $platform = // @var mixed agent->platform(;
        $browser = // @var mixed agent->browser(;

        return [
            'device' => is_string($device) ? $device : 'unknown',
            'platform' => is_string($platform) ? $platform : 'unknown',
            'browser' => is_string($browser) ? $browser : 'unknown',
            'is_desktop' => // @var mixed agent->isDesktop(
            'is_mobile' => // @var mixed agent->isMobile(
            'is_tablet' => // @var mixed agent->isTablet(
            'is_phone' => // @var mixed agent->isPhone(
            'is_robot' => // @var mixed agent->isRobot(
        ];
    }

    /**
     * Get browser version and robot information.
     *
     * @return array<string, mixed>
     */
    private function getBrowserInfo(): array
    {
        $browser = // @var mixed agent->browser(;
        $browserVersion = is_string($browser) ? // @var mixed agent->version($browser;

        return [
            'version' => is_string($browserVersion) ? $browserVersion : 'unknown',
            'robot' => is_string(// @var mixed agent->robot(
        ];
    }
}

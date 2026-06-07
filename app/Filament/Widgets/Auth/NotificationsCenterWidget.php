<?php

declare(strict_types=1);

namespace Modules\User\Filament\Widgets\Auth;

use Filament\Schemas\Components\Component;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Modules\User\Models\BaseUser;
use Modules\Xot\Filament\Widgets\XotBaseSchemaWidget;

/**
 * Centro notifiche in-app (FR-022 / STORY-035) — elenco DB + segna come letto.
 */
class NotificationsCenterWidget extends XotBaseSchemaWidget
{
    protected string $view = 'user::widgets.auth.notifications-center-widget';

    /** @var DatabaseNotificationCollection<int, DatabaseNotification>|Collection */
    public Collection|DatabaseNotificationCollection $notifications;

    public int $unreadCount = 0;

    public function mount(): void
    {
        $this->refreshNotifications();
    }

    /**
     * @return array<string, Component>
     */
    public function getFormSchema(): array
    {
        return [];
    }

    public function markAsRead(string $notificationId): void
    {
        $user = $this->authUser();
        if ($user === null) {
            return;
        }

        $notification = $user->notifications()->whereKey($notificationId)->first();
        $notification?->markAsRead();

        $this->refreshNotifications();
    }

    public function markAllAsRead(): void
    {
        $user = $this->authUser();
        if ($user === null) {
            return;
        }

        $user->unreadNotifications->markAsRead();

        $this->refreshNotifications();
    }

    private function refreshNotifications(): void
    {
        $user = $this->authUser();
        if ($user === null) {
            $this->notifications = collect();
            $this->unreadCount = 0;

            return;
        }

        /** @var Collection<int, DatabaseNotification> $notifications */
        $notifications = $user->notifications()->latest()->limit(50)->get();
        $this->notifications = $notifications;
        $this->unreadCount = $user->unreadNotifications()->count();
    }

    private function authUser(): ?BaseUser
    {
        $user = Auth::user();

        return $user instanceof BaseUser ? $user : null;
    }
}

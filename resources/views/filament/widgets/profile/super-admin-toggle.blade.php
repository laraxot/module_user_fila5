<?php

declare(strict_types=1);
?>
<div>
@if (isset($profile) && $profile->isSuperAdmin())
    <x-filament::icon-button
        icon="user-superadmin"
        color="warning"
        size="sm"
        data-super-admin-state="active"
        :label="__('user::super_admin_widget.tooltip.active')"
        :tooltip="__('user::super_admin_widget.tooltip.active')"
        wire:click="toggleSuperAdmin"
    />
@endif
@if (isset($profile) && $profile->isNegateSuperAdmin())
    <x-filament::icon-button
        icon="user-negate-superadmin"
        color="danger"
        size="sm"
        data-super-admin-state="negated"
        :label="__('user::super_admin_widget.tooltip.negated')"
        :tooltip="__('user::super_admin_widget.tooltip.negated')"
        wire:click="toggleSuperAdmin"
    />
@endif
</div>

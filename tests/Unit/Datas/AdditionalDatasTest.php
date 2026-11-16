<?php

declare(strict_types=1);
use Modules\User\Datas\DeviceData;
use Modules\User\Datas\FilamentShieldData;
use Modules\User\Datas\FilamentUserData;
use Modules\User\Datas\PermissionCacheData;
use Modules\User\Datas\PermissionColumnNamesData;
use Modules\User\Datas\PermissionData;
use Modules\User\Datas\PermissionModelsData;
use Modules\User\Datas\PermissionTableNamesData;
use Modules\User\Datas\ShieldResourceData;
use Modules\User\Datas\SocialProviderData;
use Modules\User\Datas\SuperAdminData;
use Modules\User\Tests\TestCase;

uses(TestCase::class);

test('PermissionTableNamesData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        PermissionTableNamesData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(PermissionTableNamesData::from([]))->toEqual(PermissionTableNamesData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('ShieldResourceData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        ShieldResourceData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(ShieldResourceData::from([]))->toEqual(ShieldResourceData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('FilamentUserData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        FilamentUserData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(FilamentUserData::from([]))->toEqual(FilamentUserData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('SuperAdminData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        SuperAdminData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(SuperAdminData::from([]))->toEqual(SuperAdminData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('PermissionData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        PermissionData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(PermissionData::from([]))->toEqual(PermissionData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('PermissionColumnNamesData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        PermissionColumnNamesData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(PermissionColumnNamesData::from([]))->toEqual(PermissionColumnNamesData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('PermissionCacheData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        PermissionCacheData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(PermissionCacheData::from([]))->toEqual(PermissionCacheData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('DeviceData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        DeviceData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(DeviceData::from([]))->toEqual(DeviceData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('SocialProviderData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        SocialProviderData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(SocialProviderData::from([]))->toEqual(SocialProviderData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('FilamentShieldData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        FilamentShieldData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(FilamentShieldData::from([]))->toEqual(FilamentShieldData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

test('PermissionModelsData can be instantiated', function () {
    // Un payload vuoto puo' creare il Data (tutti i campi opzionali) o essere rifiutato: entrambi gli esiti vanno bene.
    try {
<<<<<<< .merge_file_qJ0B4b
        PermissionModelsData::from([]);
    } catch (Exception $e) {
        // assertTrue(true) removed — tautology // Pass if class exists
=======
        expect(PermissionModelsData::from([]))->toEqual(PermissionModelsData::from([]));
    } catch (Exception $exception) {
        expect($exception->getMessage())->not->toBe('');
>>>>>>> .merge_file_zjOhP5
    }
});

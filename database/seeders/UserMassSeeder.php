<?php

declare(strict_types=1);

namespace Modules\User\Database\Seeders;

<<<<<<< HEAD
<<<<<<< HEAD
use Exception;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
=======
=======
>>>>>>> f589f9b2 (.)
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Modules\User\Database\Factories\AuthenticationLogFactory;
use Modules\User\Database\Factories\DeviceFactory;
use Modules\User\Database\Factories\ProfileFactory;
use Modules\User\Database\Factories\SocialProviderFactory;
use Modules\User\Database\Factories\UserFactory;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Modules\User\Models\AuthenticationLog;
use Modules\User\Models\Device;
use Modules\User\Models\Permission;
use Modules\User\Models\Profile;
use Modules\User\Models\Role;
use Modules\User\Models\SocialProvider;
use Modules\User\Models\Team;
use Modules\User\Models\User;

/**
 * Seeder per creare grandi quantità di dati per il modulo User.
 */
class UserMassSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Esegue il seeding del database.
     */
    public function run(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('🚀 Inizializzazione seeding di massa per modulo User...');
=======
        $this->info('Inizializzazione seeding di massa per modulo User...');
>>>>>>> 2024e2e7 (.)
=======
        $this->info('Inizializzazione seeding di massa per modulo User...');
>>>>>>> f589f9b2 (.)

        $startTime = microtime(true);

        try {
            // 1. Creazione ruoli e permessi avanzati
            $this->createAdvancedRolesAndPermissions();

            // 2. Creazione team specializzati
            $this->createSpecializedTeams();

            // 3. Creazione utenti con profili completi
            $this->createUsersWithProfiles();

            // 4. Creazione log di autenticazione
            $this->createAuthenticationLogs();

            // 5. Creazione dispositivi utente
            $this->createUserDevices();

            // 6. Creazione provider social
            $this->createSocialProviders();

            $endTime = microtime(true);
            $executionTime = round($endTime - $startTime, 2);

<<<<<<< HEAD
<<<<<<< HEAD
            $this->command->info("🎉 Seeding modulo User completato in {$executionTime} secondi!");
            $this->displaySummary();
        } catch (Exception $e) {
            $this->command->error('❌ Errore durante il seeding: ' . $e->getMessage());
=======
=======
>>>>>>> f589f9b2 (.)
            $this->info("Seeding modulo User completato in {$executionTime} secondi.");
            $this->displaySummary();
        } catch (\Exception $e) {
            $this->error('Errore durante il seeding: '.$e->getMessage());
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            throw $e;
        }
    }

    /**
     * Crea ruoli e permessi avanzati.
     */
    private function createAdvancedRolesAndPermissions(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('🔐 Creazione ruoli e permessi avanzati...');
=======
        $this->info('Creazione ruoli e permessi avanzati...');
>>>>>>> 2024e2e7 (.)
=======
        $this->info('Creazione ruoli e permessi avanzati...');
>>>>>>> f589f9b2 (.)

        // Permessi avanzati
        $advancedPermissions = [
            'manage-system-settings',
            'view-system-logs',
            'manage-backups',
            'manage-api-keys',
            'view-analytics',
            'manage-notifications',
            'manage-webhooks',
            'manage-integrations',
            'view-financial-data',
            'manage-billing',
            'manage-subscriptions',
            'view-audit-trail',
            'manage-data-export',
            'manage-data-import',
        ];

        foreach ($advancedPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Ruoli avanzati
        $advancedRoles = [
            'system-architect' => [
                'manage-system-settings',
                'view-system-logs',
                'manage-backups',
                'manage-api-keys',
                'view-analytics',
                'manage-integrations',
                'view-audit-trail',
            ],
            'data-analyst' => [
                'view-analytics',
                'view-financial-data',
                'view-audit-trail',
                'manage-data-export',
                'manage-data-import',
            ],
            'billing-manager' => [
                'view-financial-data',
                'manage-billing',
                'manage-subscriptions',
                'view-audit-trail',
            ],
            'integration-specialist' => [
                'manage-integrations',
                'manage-webhooks',
                'manage-api-keys',
                'view-system-logs',
            ],
        ];

        foreach ($advancedRoles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }

<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info(
            '✅ Creati ' .
            count($advancedPermissions) .
                ' permessi avanzati e ' .
                count($advancedRoles) .
                ' ruoli specializzati',
=======
=======
>>>>>>> f589f9b2 (.)
        $this->info(
            'Creati '.
            count($advancedPermissions).
                ' permessi avanzati e '.
                count($advancedRoles).
                ' ruoli specializzati.',
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
        );
    }

    /**
     * Crea team specializzati.
     */
    private function createSpecializedTeams(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('👥 Creazione team specializzati...');
=======
        $this->info('Creazione team specializzati...');
>>>>>>> 2024e2e7 (.)
=======
        $this->info('Creazione team specializzati...');
>>>>>>> f589f9b2 (.)

        $specializedTeams = [
            [
                'name' => 'Sviluppo',
                'display_name' => 'Team di Sviluppo',
                'description' => 'Team per lo sviluppo software',
            ],
            [
                'name' => 'DevOps',
                'display_name' => 'Team DevOps',
                'description' => 'Team per infrastruttura e deployment',
            ],
            ['name' => 'QA', 'display_name' => 'Team Quality Assurance', 'description' => 'Team per test e qualità'],
            ['name' => 'Design', 'display_name' => 'Team Design', 'description' => 'Team per design e UX/UI'],
            [
                'name' => 'Marketing',
                'display_name' => 'Team Marketing',
                'description' => 'Team per marketing e comunicazione',
            ],
            [
                'name' => 'Vendite',
                'display_name' => 'Team Vendite',
                'description' => 'Team per vendite e business development',
            ],
            [
                'name' => 'Supporto',
                'display_name' => 'Team Supporto',
                'description' => 'Team per supporto tecnico e clienti',
            ],
            ['name' => 'Finanza', 'display_name' => 'Team Finanza', 'description' => 'Team per gestione finanziaria'],
            [
                'name' => 'Risorse Umane',
                'display_name' => 'Team HR',
                'description' => 'Team per gestione risorse umane',
            ],
            [
                'name' => 'Legale',
                'display_name' => 'Team Legale',
                'description' => 'Team per questioni legali e compliance',
            ],
        ];

        foreach ($specializedTeams as $teamData) {
            Team::firstOrCreate(['name' => $teamData['name']], $teamData);
        }

<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('✅ Creati ' . count($specializedTeams) . ' team specializzati');
=======
        $this->info('Creati '.count($specializedTeams).' team specializzati.');
>>>>>>> 2024e2e7 (.)
=======
        $this->info('Creati '.count($specializedTeams).' team specializzati.');
>>>>>>> f589f9b2 (.)
    }

    /**
     * Crea utenti con profili completi.
     */
    private function createUsersWithProfiles(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('👤 Creazione utenti con profili completi...');

        // Crea 200 utenti generici
        $users = User::factory()
            ->count(200)
            ->create([
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now()->subDays(rand(1, 365)),
            ]);

        // Crea profili per tutti gli utenti
        foreach ($users as $user) {
            Profile::factory()->create([
=======
=======
>>>>>>> f589f9b2 (.)
        $this->info('Creazione utenti con profili completi...');

        // Crea 200 utenti generici
        $userFactory = UserFactory::new();
        /** @var Collection<int, User> $users */
        $users = $userFactory->count(200)->create([
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now()->subDays(rand(1, 365)),
        ]);

        // Crea profili per tutti gli utenti
        $profileFactory = ProfileFactory::new();
        foreach ($users as $user) {
            $profileFactory->create([
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
                'user_id' => $user->id,
                'created_at' => $user->created_at,
                'updated_at' => $user->updated_at,
            ]);
        }

        // Assegna ruoli casuali
<<<<<<< HEAD
<<<<<<< HEAD
=======
        /** @var Collection<int, \Spatie\Permission\Models\Role> $roles */
>>>>>>> 2024e2e7 (.)
=======
        /** @var Collection<int, \Spatie\Permission\Models\Role> $roles */
>>>>>>> f589f9b2 (.)
        $roles = Role::all();
        foreach ($users as $user) {
            $randomRole = $roles->random();
            $user->assignRole($randomRole);
        }

<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('✅ Creati ' . $users->count() . ' utenti con profili completi');
=======
        $this->info('Creati '.$users->count().' utenti con profilo.');
>>>>>>> 2024e2e7 (.)
=======
        $this->info('Creati '.$users->count().' utenti con profilo.');
>>>>>>> f589f9b2 (.)
    }

    /**
     * Crea log di autenticazione.
     */
    private function createAuthenticationLogs(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('📝 Creazione log di autenticazione...');

        // Crea 1000 log di autenticazione
        $logs = AuthenticationLog::factory()
            ->count(1000)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
            ]);

        $this->command->info('✅ Creati ' . $logs->count() . ' log di autenticazione');
=======
=======
>>>>>>> f589f9b2 (.)
        $this->info('Creazione log di autenticazione...');

        // Crea 1000 log di autenticazione
        $logFactory = AuthenticationLogFactory::new();
        /** @var Collection<int, AuthenticationLog> $logs */
        $logs = $logFactory->count(1000)->create([
            'created_at' => Carbon::now()->subDays(rand(1, 30)),
        ]);

        $this->info('Creati '.$logs->count().' log di autenticazione.');
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Crea dispositivi utente.
     */
    private function createUserDevices(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('📱 Creazione dispositivi utente...');

        // Crea 500 dispositivi
        $devices = Device::factory()
            ->count(500)
=======
=======
>>>>>>> f589f9b2 (.)
        $this->info('Creazione dispositivi utente...');

        // Crea 500 dispositivi
        $deviceFactory = DeviceFactory::new();
        /** @var Collection<int, Device> $devices */
        $devices = $deviceFactory->count(500)
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 90)),
            ]);

<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('✅ Creati ' . $devices->count() . ' dispositivi utente');
=======
        $this->info('Creati '.$devices->count().' dispositivi.');
>>>>>>> 2024e2e7 (.)
=======
        $this->info('Creati '.$devices->count().' dispositivi.');
>>>>>>> f589f9b2 (.)
    }

    /**
     * Crea provider social.
     */
    private function createSocialProviders(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('🔗 Creazione provider social...');

        // Crea 100 provider social
        $providers = SocialProvider::factory()
            ->count(100)
            ->create([
                'created_at' => Carbon::now()->subDays(rand(1, 180)),
            ]);

        $this->command->info('✅ Creati ' . $providers->count() . ' provider social');
=======
=======
>>>>>>> f589f9b2 (.)
        $this->info('Creazione provider social...');

        // Crea 100 provider social
        $providerFactory = SocialProviderFactory::new();
        /** @var Collection<int, SocialProvider> $providers */
        $providers = $providerFactory->count(100)->create([
            'created_at' => Carbon::now()->subDays(rand(1, 180)),
        ]);

        $this->info('Creati '.$providers->count().' provider social.');
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }

    /**
     * Mostra un riassunto dei dati creati.
     */
    private function displaySummary(): void
    {
<<<<<<< HEAD
<<<<<<< HEAD
        $this->command->info('📊 RIASSUNTO DATI CREATI PER MODULO USER:');
        $this->command->info('┌─────────────────────────────────────┐');
=======
        $this->info('RIASSUNTO DATI CREATI PER MODULO USER:');
        $this->info('-------------------------------------');
>>>>>>> 2024e2e7 (.)
=======
        $this->info('RIASSUNTO DATI CREATI PER MODULO USER:');
        $this->info('-------------------------------------');
>>>>>>> f589f9b2 (.)

        try {
            // Conta utenti
            $totalUsers = User::count();
            $verifiedUsers = User::whereNotNull('email_verified_at')->count();

<<<<<<< HEAD
<<<<<<< HEAD
            $this->command->info('│ 👥 Utenti totali:           ' .
            str_pad((string) $totalUsers, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│    - Verificati:             ' .
            str_pad((string) $verifiedUsers, 6, ' ', STR_PAD_LEFT) .
                ' │');
=======
            $this->info('Utenti totali: '.str_pad((string) $totalUsers, 6, ' ', STR_PAD_LEFT));
            $this->info('Utenti verificati: '.str_pad((string) $verifiedUsers, 6, ' ', STR_PAD_LEFT));
>>>>>>> 2024e2e7 (.)
=======
            $this->info('Utenti totali: '.str_pad((string) $totalUsers, 6, ' ', STR_PAD_LEFT));
            $this->info('Utenti verificati: '.str_pad((string) $verifiedUsers, 6, ' ', STR_PAD_LEFT));
>>>>>>> f589f9b2 (.)

            // Conta profili
            $totalProfiles = Profile::count();

<<<<<<< HEAD
<<<<<<< HEAD
            $this->command->info('│ 👤 Profili totali:          ' .
            str_pad((string) $totalProfiles, 6, ' ', STR_PAD_LEFT) .
                ' │');
=======
            $this->info('Profili totali: '.str_pad((string) $totalProfiles, 6, ' ', STR_PAD_LEFT));
>>>>>>> 2024e2e7 (.)
=======
            $this->info('Profili totali: '.str_pad((string) $totalProfiles, 6, ' ', STR_PAD_LEFT));
>>>>>>> f589f9b2 (.)

            // Conta ruoli e permessi
            $totalRoles = Role::count();
            $totalPermissions = Permission::count();
            $totalTeams = Team::count();

<<<<<<< HEAD
<<<<<<< HEAD
            $this->command->info('│ 🔐 Ruoli:                  ' .
            str_pad((string) $totalRoles, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│ 🔑 Permessi:               ' .
            str_pad((string) $totalPermissions, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│ 👥 Team:                   ' .
            str_pad((string) $totalTeams, 6, ' ', STR_PAD_LEFT) .
                ' │');
=======
            $this->info('Ruoli totali: '.str_pad((string) $totalRoles, 6, ' ', STR_PAD_LEFT));
            $this->info('Permessi totali: '.str_pad((string) $totalPermissions, 6, ' ', STR_PAD_LEFT));
            $this->info('Team totali: '.str_pad((string) $totalTeams, 6, ' ', STR_PAD_LEFT));
>>>>>>> 2024e2e7 (.)
=======
            $this->info('Ruoli totali: '.str_pad((string) $totalRoles, 6, ' ', STR_PAD_LEFT));
            $this->info('Permessi totali: '.str_pad((string) $totalPermissions, 6, ' ', STR_PAD_LEFT));
            $this->info('Team totali: '.str_pad((string) $totalTeams, 6, ' ', STR_PAD_LEFT));
>>>>>>> f589f9b2 (.)

            // Conta log e dispositivi
            $totalLogs = AuthenticationLog::count();
            $totalDevices = Device::count();
            $totalProviders = SocialProvider::count();

<<<<<<< HEAD
<<<<<<< HEAD
            $this->command->info('│ 📝 Log autenticazione:      ' .
            str_pad((string) $totalLogs, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│ 📱 Dispositivi:             ' .
            str_pad((string) $totalDevices, 6, ' ', STR_PAD_LEFT) .
                ' │');
            $this->command->info('│ 🔗 Provider social:         ' .
            str_pad((string) $totalProviders, 6, ' ', STR_PAD_LEFT) .
                ' │');
        } catch (Exception $e) {
            $this->command->info('│ ❌ Errore nel conteggio: ' . $e->getMessage());
        }

        $this->command->info('└─────────────────────────────────────┘');
        $this->command->info('');
=======
=======
>>>>>>> f589f9b2 (.)
            $this->info('Log autenticazione: '.str_pad((string) $totalLogs, 6, ' ', STR_PAD_LEFT));
            $this->info('Dispositivi: '.str_pad((string) $totalDevices, 6, ' ', STR_PAD_LEFT));
            $this->info('Provider social: '.str_pad((string) $totalProviders, 6, ' ', STR_PAD_LEFT));
        } catch (\Exception $e) {
            $this->info('Errore nel conteggio: '.$e->getMessage());
        }

        $this->info('-------------------------------------');
        $this->info('');
    }

    private function info(string $message): void
    {
        $command = $this->getConsoleCommand();
        $command->info($message);
    }

    private function error(string $message): void
    {
        $command = $this->getConsoleCommand();
        $command->error($message);
    }

    private function getConsoleCommand(): Command
    {
        return $this->command;
<<<<<<< HEAD
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
    }
}

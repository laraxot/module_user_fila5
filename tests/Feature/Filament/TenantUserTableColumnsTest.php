<?php

declare(strict_types=1);
<<<<<<< .merge_file_xZ2Dcb
<<<<<<< HEAD
<<<<<<< .merge_file_phTbaR

=======
>>>>>>> .merge_file_pp4aoj
=======
<<<<<<< .merge_file_U5QD8o

=======
<<<<<<< .merge_file_AO3rR9

=======
>>>>>>> .merge_file_54eiya
>>>>>>> .merge_file_J6IRG4
>>>>>>> df2ba808 (.)
=======
>>>>>>> .merge_file_7oSL3v
use Modules\User\Filament\Resources\TenantUserResource\Pages\ListTenantUsers;
use Modules\User\Filament\Resources\TenantUserResource\Tables\TenantUsersTable;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;
use Webmozart\Assert\Assert;

uses(TestCase::class);

/*
 * Regressione: `Filament\Tables\Concerns\HasColumns::getTableColumns()` e'
 * deprecato e ritorna array vuoto. Quella dichiarazione soddisfa il metodo
 * astratto di HasXotTable, quindi una pagina di elenco che non reimplementa il
 * metodo mostrava una tabella senza nessuna colonna.
 */
describe('colonne elenco tenant user', function (): void {
    it('non lascia che sia lo stub deprecato di Filament a fornire le colonne', function (): void {
        $method = new ReflectionMethod(ListTenantUsers::class, 'getTableColumns');

        expect($method->getDeclaringClass()->getName())->toBe(XotBaseListRecords::class);
    });

    it('prende le colonne dalla classe Table della Resource', function (): void {
        $table = app(TenantUsersTable::class);
        Assert::isInstanceOf($table, XotBaseResourceTable::class);

        expect($table->getTableColumns())->not->toBeEmpty();
    });
});

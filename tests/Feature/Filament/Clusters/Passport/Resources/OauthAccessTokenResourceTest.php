<?php

declare(strict_types=1);

use Filament\Tables\Columns\Column;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Mockery\MockInterface;
use Modules\User\Filament\Clusters\Passport;
use Modules\User\Filament\Clusters\Passport\Resources\OauthAccessTokenResource;
use Modules\User\Models\OauthAccessToken;
use Modules\User\Tests\TestCase;
use Modules\Xot\Filament\Resources\XotBaseResource;
use PHPUnit\Framework\Assert;

/*
 * Il resource si interroga senza toccare il database: `table()` costruisce solo la
 * definizione delle colonne, il livewire host è un mock del contratto HasTable.
 */

uses(TestCase::class);

afterEach(function (): void {
    Mockery::close();
});

it('oauth access token resource extends the xot base resource', function (): void {
    Assert::assertSame(XotBaseResource::class, get_parent_class(OauthAccessTokenResource::class));
});

it('oauth access token resource is bound to the passport cluster and model', function (): void {
    Assert::assertSame(Passport::class, OauthAccessTokenResource::getCluster());
    Assert::assertSame(OauthAccessToken::class, OauthAccessTokenResource::getModel());
});

it('oauth access token resource declares the expected table columns', function (): void {
    /** @var HasTable&MockInterface $livewire */
    $livewire = Mockery::mock(HasTable::class);

    $table = OauthAccessTokenResource::table(Table::make($livewire));

    $names = array_map(
        static fn (Column $column): string => $column->getName(),
        $table->getColumns()
    );

    Assert::assertContains('id', $names);
    Assert::assertContains('user.name', $names);
});

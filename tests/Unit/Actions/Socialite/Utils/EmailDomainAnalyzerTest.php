<?php

declare(strict_types=1);
<<<<<<< .merge_file_IpmRHK

=======
>>>>>>> .merge_file_lGECuB
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Contracts\User as SocialiteUser;
use Mockery\MockInterface;
use Modules\User\Actions\Socialite\Utils\EmailDomainAnalyzer;
<<<<<<< .merge_file_IpmRHK
use PHPUnit\Framework\Assert;

uses(Modules\User\Tests\TestCase::class);

function createMockSocialiteUser(?string $email): SocialiteUser
=======
use Modules\User\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function createMockSocialiteUserForEmailAnalyzer(?string $email): SocialiteUser
>>>>>>> .merge_file_lGECuB
{
    return configureMock(SocialiteUser::class, function (MockInterface $mock) use ($email): void {
        $mock->allows(['getEmail' => $email]);
    });
}

describe('EmailDomainAnalyzer', function () {
    beforeEach(function () {
        /* @var \Modules\User\Tests\TestCase $this */
        Config::set('services.google.email_domains.first_party.tld', null);
        Config::set('services.google.email_domains.client.tld', null);
    });

<<<<<<< .merge_file_IpmRHK
    it('throws for empty provider', function () {
    });
=======
    it('throws for empty provider')->todo();
>>>>>>> .merge_file_lGECuB

    it('detects first party domain', function () {
        Config::set('services.google.email_domains.first_party.tld', '@company.com');

<<<<<<< .merge_file_IpmRHK
        $ssoUser = createMockSocialiteUser('user@company.com');
=======
        $ssoUser = createMockSocialiteUserForEmailAnalyzer('user@company.com');
>>>>>>> .merge_file_lGECuB
        $analyzer = new EmailDomainAnalyzer('google');
        $analyzer->setUser($ssoUser);

        Assert::assertTrue($analyzer->hasFirstPartyDomain());
        Assert::assertFalse($analyzer->hasUnrecognizedDomain());
    });

    it('detects client domain', function () {
        Config::set('services.google.email_domains.client.tld', '@client.org');

<<<<<<< .merge_file_IpmRHK
        $ssoUser = createMockSocialiteUser('user@client.org');
=======
        $ssoUser = createMockSocialiteUserForEmailAnalyzer('user@client.org');
>>>>>>> .merge_file_lGECuB
        $analyzer = new EmailDomainAnalyzer('google');
        $analyzer->setUser($ssoUser);

        Assert::assertTrue($analyzer->hasClientDomain());
    });

    it('marks unknown domain as unrecognized', function () {
<<<<<<< .merge_file_IpmRHK
        $ssoUser = createMockSocialiteUser('user@random.com');
=======
        $ssoUser = createMockSocialiteUserForEmailAnalyzer('user@random.com');
>>>>>>> .merge_file_lGECuB
        $analyzer = new EmailDomainAnalyzer('google');
        $analyzer->setUser($ssoUser);

        Assert::assertTrue($analyzer->hasUnrecognizedDomain());
        Assert::assertFalse($analyzer->hasFirstPartyDomain());
        Assert::assertFalse($analyzer->hasClientDomain());
    });

    it('handles null email gracefully', function () {
        Config::set('services.google.email_domains.first_party.tld', '@company.com');

<<<<<<< .merge_file_IpmRHK
        $ssoUser = createMockSocialiteUser(null);
=======
        $ssoUser = createMockSocialiteUserForEmailAnalyzer(null);
>>>>>>> .merge_file_lGECuB
        $analyzer = new EmailDomainAnalyzer('google');
        $analyzer->setUser($ssoUser);

        Assert::assertFalse($analyzer->hasFirstPartyDomain());
        Assert::assertFalse($analyzer->hasClientDomain());
    });

    it('handles empty email gracefully', function () {
        Config::set('services.google.email_domains.first_party.tld', '@company.com');

<<<<<<< .merge_file_IpmRHK
        $ssoUser = createMockSocialiteUser('');
=======
        $ssoUser = createMockSocialiteUserForEmailAnalyzer('');
>>>>>>> .merge_file_lGECuB
        $analyzer = new EmailDomainAnalyzer('google');
        $analyzer->setUser($ssoUser);

        Assert::assertFalse($analyzer->hasFirstPartyDomain());
        Assert::assertFalse($analyzer->hasClientDomain());
    });
});

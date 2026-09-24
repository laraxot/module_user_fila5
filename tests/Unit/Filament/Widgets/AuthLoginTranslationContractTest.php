<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_tPIcj9

=======
>>>>>>> .merge_file_sZwH6V
=======
<<<<<<< .merge_file_5XwoT1

=======
<<<<<<< .merge_file_4OyX7z

=======
>>>>>>> .merge_file_GNDgQi
>>>>>>> .merge_file_T4ppG4
>>>>>>> df2ba808 (.)
use PHPUnit\Framework\Assert;

test('login widget translations have a scalar fifth level in every supported locale', function (): void {
    foreach (['it', 'en'] as $locale) {
        /** @var array<string, mixed> $translations */
        $translations = require dirname(__DIR__, 4).'/lang/'.$locale.'/auth.php';

        foreach (['google', 'microsoft', 'github', 'or_continue_with', 'submit', 'forgot_password', 'no_account', 'create_account', 'logging_in'] as $key) {
            $value = data_get($translations, 'login.'.$key.'.text');

            Assert::assertIsString($value, $locale.'.auth.login.'.$key.'.text must be a string');
            Assert::assertNotSame('', $value);
        }
    }
});

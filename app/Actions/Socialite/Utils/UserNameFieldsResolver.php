<?php

declare(strict_types=1);

namespace Modules\User\Actions\Socialite\Utils;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Laravel\Socialite\Contracts\User;

/**
 * Classe che risolve e normalizza i campi del nome utente da dati di provider Socialite.
 */
final readonly class UserNameFieldsResolver
{
<<<<<<< HEAD
    private const string NAME_SEARCH = 'before';

    private const string SURNAME_SEARCH = 'after';
=======
<<<<<<< .merge_file_6NcETh
    private const NAME_SEARCH = 'before';

    private const SURNAME_SEARCH = 'after';
=======
    private const string NAME_SEARCH = 'before';

    private const string SURNAME_SEARCH = 'after';
>>>>>>> .merge_file_zJLwQr
>>>>>>> df2ba808 (.)

    public ?string $name;

    public ?string $firstName;

    public ?string $lastName;

    public function __construct(User $user)
    {
        $this->name = $this->resolveName($user);
        $this->firstName = $this->resolveName($user);
        $this->lastName = $this->resolveSurname($user);
    }

    public static function make(User $user): self
    {
        return new self($user);
    }

    private function resolveName(User $idpUser): string
    {
        return $this->resolveNameFields($idpUser, self::NAME_SEARCH);
    }

    private function resolveSurname(User $idpUser): string
    {
        return $this->resolveNameFields($idpUser, self::SURNAME_SEARCH);
    }

    /**
     * @param  string  $searchMethod  use self constants (NAME_SEARCH, SURNAME_SEARCH)
     */
    private function resolveNameFields(User $idpUser, string $searchMethod): string
    {
        $this->validateSearchMethod($searchMethod);

        $nameSection = $this->determineNameField($idpUser, $searchMethod);

        return $nameSection->toString();
    }

    private function validateSearchMethod(string $searchMethod): void
    {
        if (! in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH], strict: true)) {
            throw new \InvalidArgumentException('Metodo di ricerca non valido');
        }
    }

    private function determineNameField(User $idpUser, string $searchMethod): Stringable
    {
        $name = $idpUser->getName();
<<<<<<< HEAD
        if (is_string($name) && ! empty($name)) {
=======
<<<<<<< .merge_file_6NcETh
        if (is_string($name) && '' !== $name) {
=======
        if (is_string($name) && ! empty($name)) {
>>>>>>> .merge_file_zJLwQr
>>>>>>> df2ba808 (.)
            $nameSection = $this->resolveNameFieldByNameAttributeAnalysis($name, $searchMethod);
            if ($nameSection->isNotEmpty()) {
                return $nameSection;
            }
        }

<<<<<<< HEAD
=======
<<<<<<< .merge_file_6NcETh
        $rawName = $this->extractRawNameField($idpUser);
        if ('' !== $rawName) {
            $nameSection = $this->resolveNameFieldByNameAttributeAnalysis($rawName, $searchMethod);
=======
>>>>>>> df2ba808 (.)
        $raw = $this->getRawUserData($idpUser);
        $nameField = '';
        if (isset($raw['name']) && is_string($raw['name']) && ! empty($raw['name'])) {
            $nameField = $raw['name'];
        }

        if (! empty($nameField)) {
            $nameSection = $this->resolveNameFieldByNameAttributeAnalysis($nameField, $searchMethod);
<<<<<<< HEAD
=======
>>>>>>> .merge_file_zJLwQr
>>>>>>> df2ba808 (.)
            if ($nameSection->isNotEmpty() && ! filter_var($nameSection->toString(), FILTER_VALIDATE_EMAIL)) {
                return $nameSection;
            }
        }

<<<<<<< HEAD
=======
<<<<<<< .merge_file_6NcETh
        return $this->analyzeEmailForNameSection($idpUser, $searchMethod);
    }

    private function extractRawNameField(User $idpUser): string
    {
        $raw = $this->getRawUserData($idpUser);
        $nameField = $raw['name'] ?? null;

        return is_string($nameField) && '' !== $nameField ? $nameField : '';
    }

=======
>>>>>>> df2ba808 (.)
        // Fallback to email analysis if name is empty or looks like an email
        return $this->analyzeEmailForNameSection($idpUser, $searchMethod);
    }

<<<<<<< HEAD
=======
>>>>>>> .merge_file_zJLwQr
>>>>>>> df2ba808 (.)
    private function analyzeEmailForNameSection(User $idpUser, string $searchMethod): Stringable
    {
        $email = $idpUser->getEmail();
        if (! is_string($email) || empty($email)) {
            return Str::of('');
        }

        $emailPart = Str::of($email)
            ->trim()
            ->before('@');

        // Use conditional logic instead of dynamic method call for type safety
        if ($searchMethod === self::NAME_SEARCH) {
            return $emailPart->before('.')->trim()->title();
        }

        // self::SURNAME_SEARCH
        return $emailPart->after('.')->trim()->title();
    }

    /**
     * @return array<string, mixed>
     */
    private function getRawUserData(User $idpUser): array
    {
<<<<<<< HEAD
=======
<<<<<<< .merge_file_6NcETh
        /** @var \ReflectionClass<User> $reflection */
        $reflection = new \ReflectionClass($idpUser);

        if ($reflection->hasMethod('getRaw')) {
            return $this->rawDataFromReflectionMethod($reflection, $idpUser, 'getRaw');
        }

        if ($reflection->hasProperty('user')) {
            return $this->rawDataFromReflectionProperty($reflection, $idpUser, 'user');
        }

        return [];
    }

    /**
     * @param \ReflectionClass<User> $reflection
     *
     * @return array<string, mixed>
     */
    private function rawDataFromReflectionMethod(\ReflectionClass $reflection, User $idpUser, string $method): array
    {
        $callable = $reflection->getMethod($method);
        $callable->setAccessible(true);
        $rawValue = $callable->invoke($idpUser);

        return is_array($rawValue) ? $this->normalizeRawUserArray($rawValue) : [];
    }

    /**
     * @param \ReflectionClass<User> $reflection
     *
     * @return array<string, mixed>
     */
    private function rawDataFromReflectionProperty(\ReflectionClass $reflection, User $idpUser, string $property): array
    {
        $propertyReflection = $reflection->getProperty($property);
        $propertyReflection->setAccessible(true);
        $userData = $propertyReflection->getValue($idpUser);

        return is_array($userData) ? $this->normalizeRawUserArray($userData) : [];
    }

    /**
     * @param array<int|string, mixed> $data
     *
     * @return array<string, mixed>
     */
    private function normalizeRawUserArray(array $data): array
    {
        $raw = [];
        foreach ($data as $key => $value) {
            $raw[(string) $key] = $value;
=======
>>>>>>> df2ba808 (.)
        /** @var array<string, mixed> $raw */
        $raw = [];
        try {
            $reflection = new \ReflectionClass($idpUser);
            if ($reflection->hasMethod('getRaw')) {
                $method = $reflection->getMethod('getRaw');
                $method->setAccessible(true);
                $rawValue = $method->invoke($idpUser);
                if (is_array($rawValue)) {
                    foreach ($rawValue as $key => $value) {
                        $raw[(string) $key] = $value;
                    }
                }
            } elseif ($reflection->hasProperty('user')) {
                $property = $reflection->getProperty('user');
                $property->setAccessible(true);
                $userData = $property->getValue($idpUser);
                if (is_array($userData)) {
                    foreach ($userData as $key => $value) {
                        $raw[(string) $key] = $value;
                    }
                }
            }
        } catch (\ReflectionException $e) {
            // Fallback silenzioso
<<<<<<< HEAD
=======
>>>>>>> .merge_file_zJLwQr
>>>>>>> df2ba808 (.)
        }

        return $raw;
    }

    private function resolveNameFieldByNameAttributeAnalysis(string $nameField, string $searchMethod): Stringable
    {
        if (empty($nameField)) {
            return Str::of('');
        }

        if (! in_array($searchMethod, [self::NAME_SEARCH, self::SURNAME_SEARCH], strict: true)) {
            throw new \InvalidArgumentException('Metodo di ricerca non valido');
        }

        return Str::of($nameField)
            ->trim()
            ->$searchMethod(' ')
            ->trim();
    }
}

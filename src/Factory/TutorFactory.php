<?php

namespace App\Factory;

use App\Entity\Tutor;
use App\Repository\TutorRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Tutor>
 *
 * @method        Tutor|Proxy                              create(array|callable $attributes = [])
 * @method static Tutor|Proxy                              createOne(array $attributes = [])
 * @method static Tutor|Proxy                              find(object|array|mixed $criteria)
 * @method static Tutor|Proxy                              findOrCreate(array $attributes)
 * @method static Tutor|Proxy                              first(string $sortedField = 'id')
 * @method static Tutor|Proxy                              last(string $sortedField = 'id')
 * @method static Tutor|Proxy                              random(array $attributes = [])
 * @method static Tutor|Proxy                              randomOrCreate(array $attributes = [])
 * @method static TutorRepository|ProxyRepositoryDecorator repository()
 * @method static Tutor[]|Proxy[]                          all()
 * @method static Tutor[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static Tutor[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static Tutor[]|Proxy[]                          findBy(array $attributes)
 * @method static Tutor[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static Tutor[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class TutorFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Tutor::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'directivo' => self::faker()->boolean(10),
            'usuario' => self::faker()->unique()->userName(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Tutor $tutor): void {})
        ;
    }
}

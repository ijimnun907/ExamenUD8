<?php

namespace App\Factory;

use App\Entity\Grupo;
use App\Repository\GrupoRepository;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;
use Zenstruck\Foundry\Persistence\Proxy;
use Zenstruck\Foundry\Persistence\ProxyRepositoryDecorator;

/**
 * @extends PersistentProxyObjectFactory<Grupo>
 *
 * @method        Grupo|Proxy                              create(array|callable $attributes = [])
 * @method static Grupo|Proxy                              createOne(array $attributes = [])
 * @method static Grupo|Proxy                              find(object|array|mixed $criteria)
 * @method static Grupo|Proxy                              findOrCreate(array $attributes)
 * @method static Grupo|Proxy                              first(string $sortedField = 'id')
 * @method static Grupo|Proxy                              last(string $sortedField = 'id')
 * @method static Grupo|Proxy                              random(array $attributes = [])
 * @method static Grupo|Proxy                              randomOrCreate(array $attributes = [])
 * @method static GrupoRepository|ProxyRepositoryDecorator repository()
 * @method static Grupo[]|Proxy[]                          all()
 * @method static Grupo[]|Proxy[]                          createMany(int $number, array|callable $attributes = [])
 * @method static Grupo[]|Proxy[]                          createSequence(iterable|callable $sequence)
 * @method static Grupo[]|Proxy[]                          findBy(array $attributes)
 * @method static Grupo[]|Proxy[]                          randomRange(int $min, int $max, array $attributes = [])
 * @method static Grupo[]|Proxy[]                          randomSet(int $number, array $attributes = [])
 */
final class GrupoFactory extends PersistentProxyObjectFactory
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
        return Grupo::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'aula' => self::faker()->randomNumber(),
            'nombre' => self::faker()->word(),
            'planta' => self::faker()->randomNumber(),
            'tutor' => TutorFactory::random()
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Grupo $grupo): void {})
        ;
    }
}

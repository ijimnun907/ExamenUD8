<?php

namespace App\DataFixtures;

use App\Entity\Tutor;
use App\Factory\GrupoFactory;
use App\Factory\TutorFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        TutorFactory::createMany(10, [
            'clave' => $this->passwordHasher->hashPassword(new Tutor(), '1234')
        ]);

        TutorFactory::createOne([
            'usuario' => 'directivo',
            'clave' => $this->passwordHasher->hashPassword(new Tutor(), 'directivo'),
            'directivo' => true
        ]);

        GrupoFactory::createMany(20);

        $manager->flush();
    }
}

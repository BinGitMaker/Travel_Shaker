<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Resto;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class RestoFixtures extends Fixture
{
    public const RESTONUMS = 2;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::RESTONUMS; $i++) {
            $resto = new resto();
            $resto->setName($faker->name());
            $resto->setUrl("");
            $resto->setPicture('https://fakeimg.pl/350x200/?text=resto ' . $i);
        /* $hotel->setSlug($slugger->slug($name)); */
        $manager->persist($resto);
        }
        $manager->flush();
    }
}

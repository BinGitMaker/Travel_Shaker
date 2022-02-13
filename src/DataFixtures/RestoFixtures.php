<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Resto;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;

class RestoFixtures extends Fixture implements DependentFixtureInterface
{
    public const RESTONUMS = 2;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $slugger = new AsciiSlugger();
        for ($i = 0; $i < self::RESTONUMS; $i++) {
        $resto = new Resto();
        $name = $faker->name();
        $resto->setName($faker->name());
        $resto->setUrl("");
        $resto->setPicture('https://fakeimg.pl/350x200/?text=resto ' . $i);
        $resto->setAlt($faker->text());
        $resto->setSlug($slugger->slug($name)); 
        $resto->setCity($this->getReference('city_' . $i));
        $manager->persist($resto);
        $this->setReference('resto_' . $i, $resto);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CityFixtures::class,
        ];
    }
}

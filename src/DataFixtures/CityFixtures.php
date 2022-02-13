<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\City;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;

class CityFixtures extends Fixture implements DependentFixtureInterface
{
    public const CITYNUMS = 4;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $slugger = new AsciiSlugger();
        for ($i = 0; $i < self::CITYNUMS; $i++) {
        $city = new City();
        $name = $faker->name();
        $city->setName($faker->city());
        $city->setDate($faker->dateTimeBetween('-30 years', 'now'));
        $city->setDuration(2);
        $city->setPicture('https://fakeimg.pl/350x200/?text=city ' . $i);
        $city->setAlt($faker->text());
        $city->setContent($faker->realtext());
        $city->setSlug($slugger->slug($name));
        $city->setCountry($this->getReference('country_' . $i));
        $manager->persist($city);
        $this->setReference('city_' . $i, $city); 
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CountryFixtures::class,
        ];
    }
}

<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Country;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\AsciiSlugger;

class CountryFixtures extends Fixture
{
    public const COUNTRYNUMS = 5;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $slugger = new AsciiSlugger();
        for ($i = 0; $i < self::COUNTRYNUMS; $i++) {
        $country = new Country();
        $name = $faker->name();
        $country->setName($faker->country());
        $country->setDate($faker->dateTimeBetween('-15 years', 'now'));
        $country->setDuration(2);
        $country->setHello('Bonjour');
        $country->setThanku('Merci');
        $country->setBye('Au revoir');
        $country->setPicture('https://fakeimg.pl/350x200/?text=country ' . $i);
        $country->setAlt($faker->realtext());
        $country->setDiving('http://lorempixel.com/400/200');
        $country->setContent($faker->realtext());
        $country->setSlug($slugger->slug($name));
        $country->setLinks($faker->realtext());
        $manager->persist($country);
        $this->setReference('country_' . $i, $country);
        }
        $manager->flush();
        
    }
}

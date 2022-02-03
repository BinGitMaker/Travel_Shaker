<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Country;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CountryFixtures extends Fixture
{
    public const COUNTRYNUMS = 6;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::COUNTRYNUMS; $i++) {
        $country = new Country();
        $country->setName($faker->name());
        /* $country->setDate($faker->dateTimeBetween('-15 years', 'now')); */
        $country->setDuration(2);
        $country->setHello('Bonjour');
        $country->setThanku('Merci');
        $country->setBye('Au revoir');
        $country->setPicture('https://fakeimg.pl/350x200/?text=article ' . $i);
        $country->setDiving('http://lorempixel.com/400/200');
        $country->setContent($faker->realtext());
        /* $country->setSlug($slugger->slug($name)); */
        /* $country->setCity($this->getReference('city_show' . rand(1,10))); */
        $country->setLinks($faker->realtext());
        $manager->persist($country);
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

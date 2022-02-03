<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\City;
use App\Entity\Country;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    public const CITYNUMS = 6;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::CITYNUMS; $i++) {
        $city = new city();
        $city->setName($faker->name());
        /* $city->setDate($faker->dateTimeBetween('-15 years', 'now')); */
        $city->setDuration(2);
        $city->setPicture('https://fakeimg.pl/350x200/?text=city ' . $i);
        $city->setContent($faker->realtext());
        /* $city->setSlug($slugger->slug($name)); */
        /* $city->setActivity($this->getReference('activity.name' . rand(1,5))); */
        /* $city->setResto($this->getReference('activity.resto' . rand(1,5))); */
        /* $city->setHotel($this->getReference('hotel.name' . rand(1,5))); */
        $manager->persist($city);
        }
        $manager->flush();
    }

   /*  public function getDependencies()
    {
        return [
            ActivityFixtures::class,
            RestoFixtures::class,
            HotelFixtures::class,

        ];
    } */

}

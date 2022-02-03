<?php

namespace App\DataFixtures;

use App\Entity\Hotel;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HotelFixtures extends Fixture
{
    public const HOTELNUMS = 2;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::HOTELNUMS; $i++) {
            $hotel = new hotel();
            $hotel->setName($faker->name());
            $hotel->setUrl("");
            $hotel->setPicture('https://fakeimg.pl/350x200/?text=hotel ' . $i);
        /* $hotel->setSlug($slugger->slug($name)); */
        $manager->persist($hotel);
        }
        $manager->flush();
    }
}

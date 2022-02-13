<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Hotel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;

class HotelFixtures extends Fixture implements DependentFixtureInterface
{
    public const HOTELNUMS = 2;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $slugger = new AsciiSlugger();
        for ($i = 0; $i < self::HOTELNUMS; $i++) {
            $hotel = new Hotel();
            $name = $faker->name();
            $hotel->setName($faker->name());
            $hotel->setUrl("");
            $hotel->setPicture('https://fakeimg.pl/350x200/?text=hotel ' . $i);
            $hotel->setAlt($faker->text());
            $hotel->setSlug($slugger->slug($name)); 
            $hotel->setCity($this->getReference('city_' . $i));
            $manager->persist($hotel);
            $this->setReference('hotel_' . $i, $hotel);
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

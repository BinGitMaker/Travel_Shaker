<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Activity;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\String\Slugger\AsciiSlugger;

class ActivityFixtures extends Fixture implements DependentFixtureInterface
{
    public const ACTIVITYNUMS = 4;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $slugger = new AsciiSlugger();
        for ($i = 0; $i < self::ACTIVITYNUMS; $i++) {
            $activity = new Activity();
            $name = $faker->name();
            $activity->setName($faker->name());
            $activity->setDuration(2);
            $activity->setPicture('https://fakeimg.pl/350x200/?text=activity ' . $i);
            $activity->setAlt($faker->text());
            $activity->setSlug($slugger->slug($name));
            $activity->setCity($this->getReference('city_' . $i));
            $manager->persist($activity);
            $this->setReference('activity_' . $i, $activity);
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

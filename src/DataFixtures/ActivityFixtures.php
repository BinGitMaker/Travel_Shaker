<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use App\Entity\City;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActivityFixtures extends Fixture
{
    public const ACTIVITYNUMS = 4;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < self::ACTIVITYNUMS; $i++) {
            $activity = new activity();
            $activity->setName($faker->name());
            $activity->setDuration(2);
            $activity->setPicture('https://fakeimg.pl/350x200/?text=activity ' . $i);
        /* $activity->setSlug($slugger->slug($name)); */
        $manager->persist($activity);
        }
        $manager->flush();
    }
}

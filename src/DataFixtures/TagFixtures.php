<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use app\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;

class TagFixtures extends BaseFixtures
{


    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(Tag::class, 10, function(Tag $tag) {
            $tag->setName($this->faker->realText(20));
        });
        $manager->flush();
    }
}

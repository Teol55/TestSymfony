<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use app\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;

class TagFixtures extends BaseFixtures
{


    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_tags', function($i) {
            $tag= new Tag();
            $tag->setName($this->faker->realText(20));

//            $tags = $this->getRandomReferences('main_tags', 3);
//            foreach ($tags as $tag) {
//                $article->addTag($tag);
//            }
            return $tag;
        });
        $manager->flush();
    }
}

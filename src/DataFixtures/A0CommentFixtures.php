<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Article;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class A0CommentFixtures extends BaseFixtures implements DependentFixtureInterface
{
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(100,'main_comment',function($i){
            $comment= new Comment();
        $comment->setContent($this->faker->boolean ? $this->faker->paragraph : $this->faker->sentences(2,true));
        $comment->setAuthorName($this->faker->name);
        $comment->setCreatedAt($this->faker->dateTimeBetween('-1 months', '-1 seconds'));
            $comment->setArticle($this->getRandomReference('main_article'));
            $comment->setIsDeleted($this->faker->boolean(20));
            return $comment;

        });


        $manager->flush();
    }
    public function getDependencies()
    {

        return [ArticleFixtures::class];
    }
}

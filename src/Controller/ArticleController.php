<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 12/12/2018
 * Time: 16:38
 */

namespace App\Controller;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ArticleController extends AbstractController
{
    /**
     * @Route("/news/{slug}")
     */

    public function homePage($slug)
    {
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
        return $this->render('/article/show.html.twig',['title' =>ucwords(str_replace('-',' ',$slug)),
            'slug'=> $slug,
            'comments'=>$comments,

            ]);

    }
    /**
     * @Route("/test",name="app_test")
     */
    public function show()
    {
        return $this->render('/article/homepage.html.twig');
    }

    /**
     * @Route("/news/{slug}/heart",name="article_toggle_heart",methods={"POST"})
     */
    public function toggleArticleHeart($slug,LoggerInterface $logger)
    {
        $logger->info('Article is being hearted');
        return new JsonResponse(['hearts'=>rand(5,100)]);
    }
}
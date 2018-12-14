<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 12/12/2018
 * Time: 16:38
 */

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
            'comments'=>$comments,

            ]);

    }
    /**
     * @Route("/test/{slug}")
     */
    public function show($slug)
    {
        return new Response("Yes it's good Route avec annotations:".$slug);
    }
}
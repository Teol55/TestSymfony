<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 12/12/2018
 * Time: 16:38
 */

namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class ArticleController
{
    /**
     * @Route("/news")
     */

    public function homePage()
    {
        return new Response('OMG! My first page already! WOOO!');
    }
    /**
     * @Route("/test/{slug}")
     */
    public function show($slug)
    {
        return new Response("Yes it's good Route avec annotations:".$slug);
    }
}
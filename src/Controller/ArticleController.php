<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 12/12/2018
 * Time: 16:38
 */

namespace App\Controller;


class ArticleController
{
public function homePage()
    {
        return new Response('OMG! My first page already! WOOO!');
    }
}
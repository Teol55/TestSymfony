<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 29/12/2018
 * Time: 11:18
 */

namespace App\Controller;


use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ArtilcleAdminController extends AbstractController
{
    /**
     *@Route("/admin/article/new")
     */
   public function new(EntityManagerInterface $em)
   {
            die('todo');
       return new Response(sprintf(
           'Hiya! New Article id: #%d slug: %s',
           $article->getId(),
           $article->getSlug()

       ));
   }

}
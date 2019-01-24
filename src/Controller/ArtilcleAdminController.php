<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 29/12/2018
 * Time: 11:18
 */

namespace App\Controller;


use App\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
/**
 * @IsGranted("ROLE_ADMIN_ARTICLE")
 */
class ArtilcleAdminController extends AbstractController
{
    /**
     *@Route("/admin/article/new",name="admin_article_new")
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
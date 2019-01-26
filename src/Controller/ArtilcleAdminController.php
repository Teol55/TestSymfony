<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 29/12/2018
 * Time: 11:18
 */

namespace App\Controller;


use App\Entity\Article;
use App\Form\ArticleFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ArtilcleAdminController extends AbstractController
{
    /**
     *@Route("/admin/article/new",name="admin_article_new")
     *@IsGranted("ROLE_ADMIN_ARTICLE")
     */
   public function new(EntityManagerInterface $em)
   {
      $form=$this->createForm(ArticleFormType::class);
       return $this->render('article_admin/new.html.twig',[
           'articleForm'=>$form->createView(),
       ]);
   }
    /**
     * @Route("/admin/article/{id}/edit")
     * @IsGranted("MANAGE", subject="article")
     */
    public function edit(Article $article)
    {


        dd($article);
    }

}
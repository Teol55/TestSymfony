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
use App\Repository\ArticleRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class ArtilcleAdminController extends AbstractController
{
    /**
     *@Route("/admin/article/new",name="admin_article_new")
     *@IsGranted("ROLE_ADMIN_ARTICLE")
     */
   public function new(EntityManagerInterface $em, Request $request)
   {
      $form=$this->createForm(ArticleFormType::class);
      $form->handleRequest($request);
             if($form->isSubmitted()&& $form->isValid())
      {
            $article=$form->getData();



          $em->persist($article);
          $em->flush();

          $this->addFlash('success','Article Created,Knowlege is Power!!! ');
          return $this->redirectToRoute('admin_article_list');
      }
       return $this->render('article_admin/new.html.twig',[
           'articleForm'=>$form->createView(),
       ]);
   }
    /**
     * @Route("/admin/article/{id}/edit", name="admin_article_edit")
     * @IsGranted("MANAGE", subject="article")
     */
    public function edit(Article $article, Request $request,EntityManagerInterface $em)
    {
        $form = $this->createForm(ArticleFormType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($article);
            $em->flush();
            $this->addFlash('success', 'Article Updated! Inaccuracies squashed!');
            return $this->redirectToRoute('admin_article_edit', [
                'id' => $article->getId(),
            ]);
        }
        return $this->render('article_admin/new.html.twig', [
            'articleForm' => $form->createView()
        ]);
    }

    /**
     * @Route("admin/article",name="admin_article_list")
     */
    public function list(ArticleRepository $repository)
    {
        $articles=$repository->findAll();
             return $this->render('article_admin/list.html.twig',
        ['articles'=>$articles]);
    }
}
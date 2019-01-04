<?php
/**
 * Created by PhpStorm.
 * User: tof
 * Date: 12/12/2018
 * Time: 16:38
 */

namespace App\Controller;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Service\MarkdownHelper;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class ArticleController extends AbstractController
{
    /**
     * Currently unused: just showing a controller with a constructor!
     */
    private $isDebug;

    public function __construct(bool $isDebug)
    {
        $this->isDebug = $isDebug;
    }

    /**
     * @Route("/news/{slug}")
     * @param $slug
     * @param MarkdownHelper $markdownHelper
     * @return Response
     */
    public function show(Article $article)
    {


        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
        return $this->render('/article/show.html.twig', [
            'article' => $article,
            'comments' => $comments,

        ]);

    }

    /**
     * @Route("/",name="app_homepage")
     */
    public function homepage(ArticleRepository $repository)
    {

        $articles = $repository->findAllPublishedOrderedByNewest();
        return $this->render('article/homepage.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/news/{slug}/heart",name="article_toggle_heart",methods={"POST"})
     * @param $slug
     * @param LoggerInterface $logger
     * @return JsonResponse
     */
    public function toggleArticleHeart(Article $article, LoggerInterface $logger,EntityManagerInterface $em)
    {
        $article->incrementHeartCount();
        $em->flush();
        $logger->info('Article is being hearted');
        return new JsonResponse(['hearts' => $article->getHeartCount()]);
    }
}
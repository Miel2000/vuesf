<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(ArticleRepository $repo): Response
    {


        $articles = $repo->findAll();


        return $this->render('article/index.html.twig', [
            'articles' =>  $articles ,
        ]);
    }

    /**
     * @Route("/article/{id}", name="article_show")
     */
    public function showOneArticle(Article $article): Response
    {

        return $this->render('article/id/index.html.twig', [
            'article' =>  $article
        ]);
    }
}

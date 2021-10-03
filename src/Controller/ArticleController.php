<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index(ArticleRepository $repo): Response
    {

        $serializer = new Serializer([new ObjectNormalizer()]);
        $articles = $repo->findAll();
       

        return new JsonResponse([
            'articles' =>  $serializer->normalize($articles) ,
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

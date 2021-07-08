<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/articles", name="articleList")
     */
    public function articleList(ArticleRepository $articleRepository)
    {

        // Request SQL SELECT on DB
        // on article table
        // class do request SELECT on ArticleRepository
        // inst class
        // use autowire classe argu controller,
        // following var who want sf inst class

        $articles= $articleRepository->findAll();

        return $this->render('article-List.html.twig', [
            'articles' => $articles
        ]);
    }
    /**
     * @Route("/articles/{id}", name="articleShow")
     */
    public function articleShow($id, ArticleRepository $articleRepository)

    {
        // show article from id in url (in wildcard)
        $article = $articleRepository->find($id);

        // if article not found, return exception (error)
        // showing 404
        if (is_null($article)) {
            throw new NotFoundHttpException();
        }

        return $this->render('article-Show.html.twig',[
        'article' => $article
        ]);
    }
}


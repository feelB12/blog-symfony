<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
    /**
     * @Route("/search", name="search")
     */
    // create function to search a term in article
    public function search(ArticleRepository $articleRepository, Request $request)
    {

        $term = $request->query->get('q');

        //$term is the term we want to search in article
        //$term = 'of';

        //method can search in article repository the term searched
        $articles = $articleRepository->searchByTerm($term);

        // show the resarch in article_search and the result of the search
        return $this->render('article-Search.html.twig', [
            'articles' => $articles,
            'term' => $term
        ]);
    }
}

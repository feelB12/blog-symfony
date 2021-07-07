<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    /**
     * @Route("/articles", name="articleList")
     */
    public function articleList(ArticleRepository $articleRepository)
    {
        // je dois faire une requête SQL SELECT en bdd
        // sur la table article
        // La classe qui me permet de faire des requêtes SELECT est ArticleRepository
        // donc je dois instancier cette classe
        // pour ça, j'utilise l'autowire (je place la classe en argument du controleur,
        // suivi de la variable dans laquelle je veux que sf m'instancie la classe
        $articles= $articleRepository->findAll();
        //find
        //findOneBy

        return $this->render('article-list.html.twig', [
            'articles' => $articles
        ]);
    }
    /**
     * @Route("/articles/{id}", name="articleShow")
     */
    public function articleShow($id, ArticleRepository $articleRepository)

    {
        // afficher un article en fonction  de l'id renseigné dans l'url (en wildcard)
        $article = $articleRepository->find($id);

        //dump($article), die;
        return $this->render('article-show.html.twig',[
        'article' => $article
        ]);
    }
}


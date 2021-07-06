<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogArticleController extends AbstractController
{
    private $categories = [
        '1' => [
            "title" => "Politique",
            "content" => "Tous les articles liés à Jean Lassalle",
            "id" => 1,
            "published" => true,
        ],
        '2' => [
            "title" => "Economie",
            "content" => "Les meilleurs tuyaux pour avoir DU FRIC",
            "id" => 2,
            "published" => true
        ],
        '3' => [
            "title" => "Securité",
            "content" => "Attention les étrangers sont très méchants",
            "id" => 3,
            "published" => false
        ],
        '4' => [
            "title" => "Ecologie",
            "content" => "Hummer <3",
            "id" => 4,
            "published" => true
        ]
    ];


    /**
     * @Route("/Categories", name="categoryList")
     */
    public function categoryList()
    {
        return $this->render('blog-list.html.twig', [
            'categories' => $this->categories
        ]);
    }

    /**
     * @Route("/category/{id}", name="categoryShow")
     */
    public function categoryShow($id)
    {

        return $this->render('blog-show.html.twig', [
            'category' => $this->categories[$id]
        ]);
    }
}

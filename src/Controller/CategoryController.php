<?php

namespace App\Controller;


use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    /**
     * @Route("/categories", name="categoryList")
     */
    public function categoryList(CategoryRepository $categoryRepository)
    {
        // Request SQL SELECT on DB
        // on category table
        // class do request SELECT on CategoryRepository
        // inst class
        // use autowire (classe argu controller,
        // following var who want sf inst class
        $categories= $categoryRepository->findAll();
        //find
        //findOneBy

        return $this->render('category-List.html.twig', [
            'categories' => $categories
        ]);
    }
    /**
     * @Route("/categories/{id}", name="categoryShow")
     */
    public function categoryShow($id, CategoryRepository $categoryRepository)

    {
        // show Category from id in url (in wildcard)
        $category = $categoryRepository->find($id);

        // if category not found, return exception (error)
        // showing 404
        if (is_null($category)) {
            throw new NotFoundHttpException();
        }

        return $this->render('category-Show.html.twig',[
            'category' => $category
        ]);
    }
}



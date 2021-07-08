<?php

namespace App\Controller;

use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    // Request SQL SELECT en DB
    // on category table
    // class do request SELECT on CategoryRepository
    // inst class
    // use autowire classe argu controller,
    // following var who want sf inst class
    /**
     * @Route("/tags", name="tagList")
     */
    public function tagList(TagRepository $tagRepository)
    {
        $tags = $tagRepository->findAll();

        return $this->render('tag-list.html.twig', [
            'tags' => $tags
        ]);
    }

    /**
     * @Route("/tags/{id}", name="tagShow")
     */
    public function tagShow($id, TagRepository $tagRepository)
    {
        $tag = $tagRepository->find($id);

        // if tag not found, return exception (error)
        // showing 404
        if (is_null($tag)) {
            throw new NotFoundHttpException();
        }

        return $this->render('tag-Show.html.twig', [
            'tag' => $tag
        ]);
    }

}
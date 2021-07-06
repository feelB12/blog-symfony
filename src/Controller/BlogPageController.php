<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogPageController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        // je retourne une réponse valide pour ma page d'accueil
        // je retourne  la reponse dans le HTTPFoundation
        return new Response( 'Home Sweet Home');
    }
    /**
     * @Route("/aboutus", name="Aboutus")
     */
    public function aboutus()
    {
        // je retourne une réponse valide pour ma page Qui sommes nous
        // je retourne  la reponse dans le HTTPFoundation
        return new Response( 'We are The Blog');
    }
    /**
     * @Route("/legals", name="Legals")
     */
    public function legals()
    {
        // je retourne une réponse valide pour ma page de Mention légales
        // je retourne  la reponse dans le HTTPFoundation
        return new Response( 'Blog Legals' );
    }
}


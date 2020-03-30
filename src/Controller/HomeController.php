<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ThemeRepository;
use Symfony\Component\HttpFoundation\Session\Session;



class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(ThemeRepository $themeRepo)
    {
        $themes = $themeRepo->findAll();

        $session = new Session();
        $session->start();

        // set and get session attributes
        $session->set('themesNav', $themes);
        $test =  $session->get('themesNav');

        return $this->render('home/home.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}

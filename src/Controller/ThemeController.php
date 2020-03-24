<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ThemeRepository;

class ThemeController extends AbstractController
{
    /**
     * @Route("/themes", name="themes")
     */
    public function index(ThemeRepository $repo)
    {
        $themes = $repo->findAll();
        
        return $this->render('theme/index.html.twig', [
            'themes' => $themes,
        ]);
    }
}

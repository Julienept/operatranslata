<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ThemeRepository;
use App\Repository\ImageRepository;


class ThemeController extends AbstractController
{
    /**
     * @Route("/themes", name="themes")
     */
    public function index(ThemeRepository $themeRepo, ImageRepository $imageRepo)
    {
        $themes = $themeRepo->findAll();

        $images = $imageRepo->findAll();

        
        return $this->render('theme/index.html.twig', [
            'themes' => $themes,
            'images' => $images,
        ]);
    }
}

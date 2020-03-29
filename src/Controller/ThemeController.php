<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ThemeRepository;
use App\Repository\ImageRepository;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Request;


class ThemeController extends AbstractController
{
    /**
     * @Route("/themes/{themeName}  ", name="themes")
     */
    public function index(ThemeRepository $themeRepo, ImageRepository $imageRepo, $themeName)
    {        
        $themes = $themeRepo->findAll();

        switch($themeName)
        {
            case 'all':
                $images = $imageRepo->findAll();

            break;

            default:
                $images = $imageRepo->findByTheme($themeName);
            break;

        }

        foreach($images as $image) {

            $image->defineImgUrl();

        }

        return $this->render('theme/index.html.twig', [
            'themes' => $themes,
            'images' => $images,
        ]);
    }
}

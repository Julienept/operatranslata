<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Image;

class IllustrationController extends AbstractController
{
    /**
     * @Route("/illustrations", name="illustrations")
     */
    public function index()
    {
        return $this->render('illustration/index.html.twig', [
            'controller_name' => 'IllustrationController',
        ]);
    }

    /**
     * @Route("/illustration/{id}", name="show_illustration")
     */
    public function show(Image $image)
    {

        $image->defineImgUrl();
        return $this->render('illustration/show.html.twig', [
            'image' => $image,
        ]);
    }
}

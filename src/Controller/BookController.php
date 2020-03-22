<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;

class BookController extends AbstractController
{
    /**
     * @Route("/books", name="book")
     */
    public function index(BookRepository $repo)
    {
        $books = $repo->findAll();

        return $this->render('book/books.html.twig', [
            'books' => $books,
        ]);
    }
}

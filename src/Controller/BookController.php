<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BookRepository;
use App\Entity\Book;

class BookController extends AbstractController
{
    /**
     * @Route("/books", name="books")
     */
    public function index(BookRepository $repo)
    {
        $books = $repo->findAll();

        return $this->render('book/books.html.twig', [
            'books' => $books,
        ]);
    }

    /**
     * Permet d'afficher une oeuvre complète
     *
     * @Route("/book/{id}", name="book_show")
     * 
     * @return Response
     */
    public function show(Book $book){

        foreach($book->getImages() as $images)
        {
            $images->defineImgUrl();
            
        }

        return $this->render('book/show.html.twig', [
            'book' => $book
        ]);
    }
}

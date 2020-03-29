<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Asset\Package;
use Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $page_number;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Book", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $book;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Theme", inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $theme;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bookInitials;
    
    private $imgUrl;
    // public function __construct()
    // {
    //    $this->setImgUrl();
    // }

    public function defineImgUrl()
    {
        $finder = new Finder();
        // find all files in the current directory

            $folder = 'images/'. $this->bookInitials .'/';

            //var_dump($folder);
            
            $finder->files()->in($folder);

                if ($finder->hasResults()) 
                {
                    $this->imgUrl = $folder . $this->url.'.jpg';    


                }
    
    }

    
    public function __toString(): string
    {
        return $this->getUrl();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPageNumber(): ?int
    {
        return $this->page_number;
    }

    public function setPageNumber(int $page_number): self
    {
        $this->page_number = $page_number;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    public function getBookInitials(): ?string
    {
        return $this->bookInitials;
    }

    public function setBookInitials(string $bookInitials): self
    {
        $this->bookInitials = $bookInitials;

        return $this;
    }
 

}

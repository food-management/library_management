<?php

namespace App\Controller;

use App\Repository\BookRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    private BookRepository $repo;
    public function __construct(BookRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="homepage")
     */
    public function indexPageAction(): Response
    {
        $book = $this->repo->findAll();
        return $this->render('home.html.twig', [
            'book'=>$book
        ]);
    }
     /**
     * @Route("/admin", name="adminPage")
     */
    public function adminPageAction(): Response{
        return $this->render('admin.html.twig', [
            
        ]);
    }
}

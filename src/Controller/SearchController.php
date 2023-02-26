<?php

namespace App\Controller;

use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(BookRepository $repo, Request $req): Response
    {
        $name = $req->query->get('name');
        $book = $repo->SearchBookByName($name);
        return $this->render('book/show.html.twig', [
            'book'=>$book
        ]);
        // return $this->json($search);
    }
}

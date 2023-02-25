<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
     * @Route("/author")
     */
    class AuthorController extends AbstractController
    {
        private AuthorRepository $repo;
        public function __construct(AuthorRepository $repo)
       {
          $this->repo = $repo;
       }
     /**
     * @Route("/", name="author_show")
     */
        public function authorshowAction(): Response
        {
            $author= $this->repo->findAll();
            return $this->render('author/index.html.twig', [
                'author'=>$author
            ]);
        }

        
     /**
     * @Route("/showauthorlist", name="show_author_list")
     */
    public function showAuthorList(): Response
    {
        $author= $this->repo->findAll();
        return $this->render('author/show.html.twig', [
            'author'=>$author
        ]);
    }   

     /**
     * @Route("/{id}", name="author_read",requirements={"id"="\d+"})
     */
    public function showAction(Author $a): Response
    {
        return $this->render('detail.html.twig', [
            'a'=>$a
        ]);
    }

    /**
     * @Route("/add", name="author_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    {
        
        $a = new Author();
        $form = $this->createForm(BookForm::class, $a);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            // if($b->getCreated()===null){
            //     $b->setCreated(new \DateTime());
            // }
            $imgFile = $form->get('file')->getData();
            if ($imgFile) {
                $newFilename = $this->uploadImage($imgFile,$slugger);
                $a->setImage($newFilename);
            }
            $this->repo->save($a,true);
            return $this->redirectToRoute('author_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("author/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="author_edit",requirements={"id"="\d+"})
     */
     public function editAction(Request $req, SluggerInterface $slugger,Author $a): Response
    {
        
        
        $form = $this->createForm(AuthorType::class, $a);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            // if($b->getCreated()===null){
            //     $b->setCreated(new \DateTime());
            // }
            $imgFile = $form->get('file')->getData();
            if ($imgFile) {
                $newFilename = $this->uploadImage($imgFile,$slugger);
                $a->setImage($newFilename);
            }
            $this->repo->save($a,true);
            return $this->redirectToRoute('author_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("author/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
    public function uploadImage($imgFile, SluggerInterface $slugger): ?string{
        $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$imgFile->guessExtension();
        try {
            $imgFile->move(
                $this->getParameter('image_dir'),
                $newFilename
            );
        } catch (FileException $e) {
            echo $e;
        }
        return $newFilename;
    }


    /**
     * @Route("/delete/{id}",name="author_delete",requirements={"id"="\d+"})
     */
    
    public function deleteAction(Request $request, Author $a): Response
    {
        $this->repo->remove($a,true);
        return $this->redirectToRoute('author_show', [], Response::HTTP_SEE_OTHER);
    }

    }

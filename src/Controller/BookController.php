<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\BookType;
use App\Form\BookForm;
use App\Repository\BookRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

    /**
     * @Route("/book")
     */
class BookController extends AbstractController
{
    private BookRepository $repo;
    public function __construct(BookRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="book_show")
     */
    public function bookshowAction(): Response
    {
        $book= $this->repo->findAll();
        return $this->render('book/index.html.twig', [
            'book'=>$book
        ]);
    }

    /**
     * @Route("/{id}", name="book_read",requirements={"id"="\d+"})
     */
    public function showAction(Book $b): Response
    {
        return $this->render('detail.html.twig', [
            'b'=>$b
        ]);
    }

    /**
     * @Route("/add", name="book_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    {
        
        $b = new Book();
        $form = $this->createForm(BookForm::class, $b);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            // if($b->getCreated()===null){
            //     $b->setCreated(new \DateTime());
            // }
            $imgFile = $form->get('file')->getData();
            if ($imgFile) {
                $newFilename = $this->uploadImage($imgFile,$slugger);
                $b->setImage($newFilename);
            }
            $this->repo->save($b,true);
            return $this->redirectToRoute('book_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("book/form.html.twig",[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="book_edit",requirements={"id"="\d+"})
     */
     public function editAction(Request $req, SluggerInterface $slugger): Response
    {
        
        $b = new Book();
        $form = $this->createForm(BookForm::class, $b);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            // if($b->getCreated()===null){
            //     $b->setCreated(new \DateTime());
            // }
            $imgFile = $form->get('file')->getData();
            if ($imgFile) {
                $newFilename = $this->uploadImage($imgFile,$slugger);
                $b->setImage($newFilename);
            }
            $this->repo->save($b,true);
            return $this->redirectToRoute('book_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("book/form.html.twig",[
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
     * @Route("/delete/{id}",name="book_delete",requirements={"id"="\d+"})
     */
    
    public function deleteAction(Request $request, Book $b): Response
    {
        $this->repo->remove($b,true);
        return $this->redirectToRoute('book_show', [], Response::HTTP_SEE_OTHER);
    }

   
}

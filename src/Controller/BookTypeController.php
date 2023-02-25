<?php

namespace App\Controller;


use App\Entity\BookType;
use App\Form\BookType as FormBookType;
use App\Repository\BookRepository;
use App\Repository\BookTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

    /**
     * @Route("/booktype")
     */
class BookTypeController extends AbstractController
{
    private BookTypeRepository $repo;
    public function __construct(BookTypeRepository $repo)
   {
      $this->repo = $repo;
   }
    /**
     * @Route("/", name="booktype_show")
     */
    public function bookshowAction(): Response
    {
        $booktype= $this->repo->findAll();
        return $this->render('book_type/index.html.twig', [
            'booktypes'=>$booktype
        ]);
    }
    /**
     * @Route("/booktypeList", name="booktypeList")
     */
    public function booktypeListShowAction(): Response
    {
        $booktype= $this->repo->findAll();
        return $this->render('book_type/index.html.twig', [
            'booktypes'=>$booktype
        ]);
    }


    /**
     * @Route("/{id}", name="booktype_read",requirements={"id"="\d+"})
     */
    public function showAction(BookType $bt): Response
    {
        return $this->render('detail.html.twig', [
            'bt'=>$bt
        ]);
    }

    /**
     * @Route("/add", name="booktype_create")
     */
    public function createAction(Request $req, SluggerInterface $slugger): Response
    {
        
        $bt = new BookType();
        $form = $this->createForm(FormBookType::class, $bt);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            // if($b->getCreated()===null){
            //     $b->setCreated(new \DateTime());
            // }
            // $imgFile = $form->get('file')->getData();
            // if ($imgFile) {
            //     $newFilename = $this->uploadImage($imgFile,$slugger);
            //     $b->setImage($newFilename);
            // }
            $this->repo->save($bt,true);
            return $this->redirectToRoute('booktype_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("book_type/form.html.twig",[
            'form' => $form->createView()
        ]);
    }
   

    /**
     * @Route("/edit/{id}", name="booktype_edit",requirements={"id"="\d+"})
     */
     public function editAction(Request $req, SluggerInterface $slugger,BookType $bt): Response
    {
    
        $form = $this->createForm(FormBookType::class, $bt);

        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            // if($b->getCreated()===null){
            //     $b->setCreated(new \DateTime());
            // }
            // $imgFile = $form->get('file')->getData();
            // if ($imgFile) {
            //     $newFilename = $this->uploadImage($imgFile,$slugger);
            //     $bt->setImage($newFilename);
            // }
            $this->repo->save($bt,true);
            return $this->redirectToRoute('booktype_show', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render("book_type/form.html.twig",[
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
     * @Route("/delete/{id}",name="booktype_delete",requirements={"id"="\d+"})
     */
    
    public function deleteAction(Request $request, BookType $bt): Response
    {
        $this->repo->remove($bt,true);
        return $this->redirectToRoute('booktype_show', [], Response::HTTP_SEE_OTHER);
    }

  
}


<?php

namespace App\Controller;

use App\Entity\BorrowerList;
use App\Form\BorrowerListType;
use App\Repository\BorrowerListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

    /**
     * @Route("/borrowerlist")
     */
    class BorrowerListController extends AbstractController
    {
        private BorrowerListRepository $repo;
        public function __construct(BorrowerListRepository $repo)
       {
          $this->repo = $repo;
       }
        /**
         * @Route("/", name="borrowerlist_show")
         */
        public function bookshowAction(): Response
        {
            $borrowerlist= $this->repo->findAll();
            return $this->render('borrower_list/index.html.twig', [
                'borrowerlist'=>$borrowerlist
            ]);
        }
          /**
          * @Route("/showborrowerlist", name="showborrowerlist")
          */
        public function showBorrowerList(): Response
        {
        $borrowerlist= $this->repo->findAll();
        return $this->render('borrower_list/show.html.twig', [
            'borrowerlist'=>$borrowerlist
        ]);
        }   
    
        /**
         * @Route("/{id}", name="borrowerlist_read",requirements={"id"="\d+"})
         */
        public function showAction(BorrowerList $bl): Response
        {
            return $this->render('detail.html.twig', [
                'bl'=>$bl
            ]);
        }
    
        /**
         * @Route("/add", name="borrowerlist_create")
         */
        public function createAction(Request $req, SluggerInterface $slugger): Response
        {
            
            $bl = new BorrowerList();
            $form = $this->createForm(BorrowerListType::class, $bl);
    
            $form->handleRequest($req);
            if($form->isSubmitted() && $form->isValid()){
                // if($b->getCreated()===null){
                //     $b->setCreated(new \DateTime());
                // }
                // $imgFile = $form->get('file')->getData();
                // if ($imgFile) {
                //     $newFilename = $this->uploadImage($imgFile,$slugger);
                //     $bl->setImage($newFilename);
                // }
                $this->repo->save($bl,true);
                return $this->redirectToRoute('borrowerlist_show', [], Response::HTTP_SEE_OTHER);
            }
            return $this->render("borrower_list/form.html.twig",[
                'form' => $form->createView()
            ]);
        }
    
    
    
        /**
         * @Route("/edit/{id}", name="borrowerlist_edit",requirements={"id"="\d+"})
         */
        public function editAction(Request $req, BorrowerList $bl,
        SluggerInterface $slugger): Response
        {
            
            $form = $this->createForm(BorrowerListType::class, $bl);   
    
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
                $this->repo->save($bl,true);
                return $this->redirectToRoute('borrowerlist_show', [], Response::HTTP_SEE_OTHER);
            }
            return $this->render("borrower_list/form.html.twig",[
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
         * @Route("/delete/{id}",name="borrowerlist_delete",requirements={"id"="\d+"})
         */
        
        public function deleteAction(Request $request, BorrowerList $bl): Response
        {
            $this->repo->remove($bl,true);
            return $this->redirectToRoute('borrowerlist_show', [], Response::HTTP_SEE_OTHER);
        }
    
}

<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\BookType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class BookForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', TextType::class)
            ->add('bookauthor', EntityType::class,[
                'class'=>Author::class,
                'choice_label'=>'name'
            ])
            ->add('discription',TextType::class)
            ->add('file', FileType::class,[
                'label' => 'Book Image',
                'required' => false,
                'mapped' => false
            ])
            ->add('booktype', EntityType::class,[
                'class'=>BookType::class,
                'choice_label'=>'bookCategory'
            ])
            ->add('image', HiddenType::class,[
                'required'=> false,
                
            ])
            ->add('save', SubmitType::class)
            
            // ->add('author', EntityType::class, ['class'=>Author::class, 'choice_label'=>'author'])  
            ;
        }
    
        // public function configureOptions(OptionsResolver $resolver)
        // {
        //     $resolver->setDefaults([
        //         'data_class' => User::class,
        //     ]);
        // }
    }
    
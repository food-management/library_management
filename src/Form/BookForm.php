<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name', TextType::class)
            ->add('author', TextType::class)
            ->add('discription',TextType::class)
            ->add('file', FileType::class,[
                'label' => 'Book Image',
                'required' => false,
                'mapped' => false
            ])
            ->add('image', HiddenType::class,[
                'required'=> false,
            ])

            ->add('save', SubmitType::class)
            ;
        }
    
        // public function configureOptions(OptionsResolver $resolver)
        // {
        //     $resolver->setDefaults([
        //         'data_class' => User::class,
        //     ]);
        // }
    }
    
<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\BorrowerList;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BorrowerListType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('book', EntityType::class, ['class'=>Book::class, 'choice_label'=>'name'])
            ->add('userbr', EntityType::class, ['class'=>User::class, 'choice_label'=>'name'])
            ->add('borrowedDate', DateType::class)
            ->add('returnDate', DateType::class)
            ->add('Status', TextType::class)

            ->add('save', SubmitType::class)
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BorrowerList::class,
        ]);
    }
}

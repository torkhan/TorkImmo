<?php

namespace App\Form;

use App\Entity\ParDate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParDateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDeCreation')
            ->add('Description')
            ->add('LocAchat')
            ->add('typeProduits')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ParDate::class,
            'translation_domain' => 'forms'
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\LocAchat;
use App\Entity\Produits;
use App\Entity\TypeProduit;
use App\Entity\Zip;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeProduits',  EntityType::class,array(
            'class' => TypeProduit::class,
            'required' => false,
            'choice_label' => 'type',))
            ->add('adresse')
            ->add('ville',  EntityType::class,array(
                'class' => Zip::class,
                'required' => false,
                'choice_label' => 'nomVille'))

            ->add('prixHt')
            ->add('description')
            ->add('nombreChambre')
            ->add('surface')
            ->add('longitude')
            ->add('latitude')
            ->add('photoBase', FileType::class, array(
                'required' => false,




            ))
            ->add('photo1', FileType::class, array(
                'required' => false
            ))
            ->add('photo2', FileType::class, array(
                'required' => false
            ))
            ->add('photo3', FileType::class, array(
                'required' => false
            ))
            ->add('photo4', FileType::class, array(
                'required' => false
            ))
            ->add('dateDeCreation')
            ->add('LocAchat',  EntityType::class,array(
                'class' => LocAchat::class,
                'required' => false,

                'choice_label' => 'type'))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produits::class,
            'translation_domain' => 'forms'
        ]);
    }
}

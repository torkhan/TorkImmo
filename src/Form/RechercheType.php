<?php

namespace App\Form;

use App\Entity\LocAchat;
use App\Entity\Recherche;
use App\Entity\TypeProduit;
use App\Entity\Zip;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RechercheType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prixHt')
            ->add('nombreChambre')
            ->add('typeProduits',  EntityType::class,array(
                'class' => TypeProduit::class,
                'required' => false,
                'choice_label' => 'type',))
            ->add('ville',  EntityType::class,array(
                'class' => Zip::class,
                'required' => false,
                'choice_label' => 'nomVille'))
            ->add('LocAchat',  EntityType::class,array(
                'class' => LocAchat::class,
                'required' => false,

                'choice_label' => 'type'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recherche::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::Class, array(
                'label'=>'Prénom',
                'attr' => array(
                    'placeHolder' => 'Prénom'
                )
                ))
            ->add('nom', TextType::Class, array('label'=>'Nom'))
            ->add('email', TextType::Class, array('label'=>'E-MAIL'))
            ->add('sujet', TextType::Class, array('label'=>'Sujet'))
            ->add('message', TextareaType::Class, array('label'=>'Message'))
            /*->add('dateEnvoi', DateType::Class, array('widget' => 'single_text'))*/
            ->add('envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'translation_domain' => 'forms'
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\StPosts;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StPostsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaHora')
            ->add('contenido')
            ->add('idUsuario')
            ->add('idDeporte')
            ->add('idPostPadre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StPosts::class,
        ]);
    }
}

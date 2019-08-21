<?php

namespace App\Form;

use App\Entity\StUsuarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StUsuariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nick')
            ->add('password')
            ->add('mail')
            ->add('nombre')
            ->add('apellidos')
            ->add('ciudad')
            ->add('foto')
            ->add('fechaNac')
            ->add('estado')
            ->add('permisos')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StUsuarios::class,
        ]);
    }
}

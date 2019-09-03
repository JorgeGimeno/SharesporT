<?php

namespace App\Form;

use App\Entity\StUsuarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class EditUserDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$user=$this->getUser();
        

        $builder
            ->add('nick')
            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('mail')
            ->add('nombre')
            ->add('apellidos')
            ->add('ciudad')
            /* ->add('foto', FileType::class) */
            ->add('fechaNac', BirthdayType::class, [
                'format' => 'ddMMyyyy',
                'placeholder' => [
                    'day' => 'Día', 'month' => 'Mes', 'year' => 'Año'],
            ])
  
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StUsuarios::class,
        ]);
    }
}

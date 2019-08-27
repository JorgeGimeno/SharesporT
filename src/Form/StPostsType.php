<?php

namespace App\Form;

use App\Entity\StPosts;
use Psr\Log\LoggerInterface;
use App\Repository\StDeportesRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class StPostsType extends AbstractType
{
    private $logger;
    private $repo;
    public function __construct(StDeportesRepository $repo, LoggerInterface $logger){
        $this->repo=$repo;
        $this->logger=$logger;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         
        $deportes = array();
        
        $listaDeportes = $this->repo->findAll();

        foreach($listaDeportes as $valuesN){
            $deportes[$valuesN->getNombre()] = $valuesN->getId();
        }

        $builder
            ->add('contenido', TextareaType::class)
            ->add('idDeporte', ChoiceType::class, [
                'choices' => $deportes,
                ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => StPosts::class,
        ]);
    }
}

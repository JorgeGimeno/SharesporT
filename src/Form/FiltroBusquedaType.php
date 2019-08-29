<?php

namespace App\Form;

use App\Repository\StDeportesRepository;
use App\Repository\StUsuariosRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FiltroBusquedaType extends AbstractType
{

    private $logger;
    private $repoDepor;
    private $repoUsu;

    public function __construct(StDeportesRepository $repoDepor, 
     StUsuariosRepository $repoUsu){
        $this->repoDepor=$repoDepor;
        $this->repoUsu=$repoUsu;
        $this->logger=$logger;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $deportes = $this->listarDeportes();
        $ciudades = $this->listarCiudades();

        $builder
            ->add('deportes', ChoiceType::class, [
                'choices' => $deportes
            ])
            ->add('ciudad', ChoiceType::class, [
                'choices' => $ciudades
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }

    public function listarDeportes(){

        $deportes = array();
        $listaDeportes = $this->repoDepor->findAll();

        foreach($listaDeportes as $valuesN){
            $deportes[$valuesN->getNombre()] = $valuesN->getId();
        }

        return $deportes;

    }

    public function listarCiudades(){

        $usuarios = array();
        $listaUsuarios = $this->repoUsu->findAll();

        foreach($listaUsuarios as $valuesC){
            if(!in_array($valuesC, $ciudades)){
                $ciudades[$valuesC->getCiudad()] = $valuesC->getCiudad();
            }
        }

        return $ciudades;

    }
}

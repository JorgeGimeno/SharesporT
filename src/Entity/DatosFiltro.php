<?php

namespace App\Entity;

class DatosFiltro{

    private $ciudades;
    private $deportes;

    /**
     * Get the value of ciudad
     */ 
    public function getCiudades()
    {
        return $this->ciudades;
    }

    /**
     * Set the value of ciudad
     *
     * @return  self
     */ 
    public function setCiudades($ciudades)
    {
        $this->ciudades = $ciudades;

        return $this;
    }

      /**
     * Get the value of deporte
     */ 
    public function getDeportes()
    {
        return $this->deportes;
    }

    /**
     * Set the value of deporte
     *
     * @return  self
     */ 
    public function setDeportes($deportes)
    {
        $this->deportes = $deportes;

        return $this;
    }


}
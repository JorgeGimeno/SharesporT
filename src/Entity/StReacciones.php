<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="st_reacciones")
 * @ORM\Entity(repositoryClass="App\Repository\StReaccionesRepository")
 */
class StReacciones
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reaccion;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StUsuarios", inversedBy="reacciones")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StPosts", inversedBy="reacciones")
     * @ORM\JoinColumn(name="id_post", referencedColumnName="id")
     */
    private $post;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReaccion(): ?string
    {
        return $this->reaccion;
    }

    public function setReaccion(string $reaccion): self
    {
        $this->reaccion = $reaccion;

        return $this;
    }

    public function getUsuario(): ?StUsuarios
    {
        return $this->usuario;
    }

    public function setUsuario(?StUsuarios $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getPost(): ?StPosts
    {
        return $this->post;
    }

    public function setPost(?StPosts $post): self
    {
        $this->post = $post;

        return $this;
    }
}

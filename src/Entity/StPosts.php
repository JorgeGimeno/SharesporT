<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StPosts
 *
 * @ORM\Table(name="st_posts")
 * @ORM\Entity(repositoryClass="App\Repository\StPostsRepository")
 */
class StPosts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_hora", type="datetime", nullable=true, options={"default"="current_timestamp()"})
     */
    private $fechaHora = 'current_timestamp()';

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenido", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $contenido = 'NULL';

    /**
     * @var int
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=false)
     */
    private $idUsuario;

    /**
     * @var int
     *
     * @ORM\Column(name="id_deporte", type="integer", nullable=false)
     */
    private $idDeporte;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_post_padre", type="integer", nullable=true, options={"default"="-1"})
     */
    private $idPostPadre = '-1';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaHora(): ?\DateTimeInterface
    {
        return $this->fechaHora;
    }

    public function setFechaHora(?\DateTimeInterface $fechaHora): self
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(?string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdDeporte(): ?int
    {
        return $this->idDeporte;
    }

    public function setIdDeporte(int $idDeporte): self
    {
        $this->idDeporte = $idDeporte;

        return $this;
    }

    public function getIdPostPadre(): ?int
    {
        return $this->idPostPadre;
    }

    public function setIdPostPadre(?int $idPostPadre): self
    {
        $this->idPostPadre = $idPostPadre;

        return $this;
    }


}

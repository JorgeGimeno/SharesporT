<?php

namespace App\Entity;

use DateTimeInterface;
use App\Entity\StReacciones;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

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
    private $fechaHora;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenido", type="string", length=1000, nullable=true, options={"default"="NULL"})
     */
    private $contenido;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="StUsuarios")
     * @ORM\JoinColumn(name="id_usuario", referencedColumnName="id")
     */
    private $usuario;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="StDeportes")
     * @ORM\JoinColumn(name="id_deporte", referencedColumnName="id")
     */
    private $deporte;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_post_padre", type="integer", nullable=true, options={"default"="-1"})
     */
    private $idPostPadre = '-1';

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StReacciones", mappedBy="post")
     */
    private $reacciones;

    public function __construct()
    {
        $this->reacciones = new ArrayCollection();
    }


    public function __toString()
    {
        if ($this->contenido)
        {
            return $this->contenido;
        }else{
            return "No content on post.";
        }
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaHora(): ?DateTimeInterface
    {
        return $this->fechaHora;
    }

    public function setFechaHora(?DateTimeInterface $fechaHora): self
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
        if($this->deporte){
            return $this->deporte->getId();
        }else{
            return null;
        }
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

    public function getUsuario(): ?StUsuarios
    {
        return $this->usuario;
    }

    public function setUsuario(?StUsuarios $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }

    public function getDeporte(): ?StDeportes
    {
        return $this->deporte;
    }

    public function setDeporte(?StDeportes $deporte): self
    {
        $this->deporte = $deporte;

        return $this;
    }

    /**
     * @return Collection|StReacciones[]
     */
    public function getReacciones(): Collection
    {
        return $this->reacciones;
    }

    public function addReaccione(StReacciones $reaccione): self
    {
        if (!$this->reacciones->contains($reaccione)) {
            $this->reacciones[] = $reaccione;
            $reaccione->setPost($this);
        }

        return $this;
    }

    public function removeReaccione(StReacciones $reaccione): self
    {
        if ($this->reacciones->contains($reaccione)) {
            $this->reacciones->removeElement($reaccione);
            // set the owning side to null (unless already changed)
            if ($reaccione->getPost() === $this) {
                $reaccione->setPost(null);
            }
        }

        return $this;
    }

    public function cuentaReacciones()
    {
        $tabla_reacciones= ['LIKE'=>0,
                            'DISLIKE'=>0,
                            'DESCANSA'=>0,
                            'FLIPADO'=>0];
        if (!empty($this->reacciones)){
            foreach ($this->reacciones as $r){
                switch($r->getReaccion()){
                    case 'LIKE':
                        $tabla_reacciones['LIKE']+=1;
                        break;
                    case 'DISLIKE':
                        $tabla_reacciones['DISLIKE']+=1;
                        break;
                    case 'DESCANSA':
                        $tabla_reacciones['DESCANSA']+=1;
                        break;
                    case 'FLIPADO':
                        $tabla_reacciones['FLIPADO']+=1;
                        break;

                }
            }
        }
        return $tabla_reacciones;
    }
}

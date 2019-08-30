<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * StDeportes
 *
 * @ORM\Table(name="st_deportes")
 * @ORM\Entity(repositoryClass="App\Repository\StDeportesRepository")
 */
class StDeportes
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
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true, options={"default"="NULL"})
     */
    private $nombre = 'NULL';

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StPosts", mappedBy="StDeportes")
     */
    private $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    public function __toString()
    {
        if ($this->nombre)
        {
            return $this->nombre;
        }else{
            return "no name";
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection|StPosts[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(StPosts $post): self
    {
        if (!$this->posts->contains($post)) {
            $this->posts[] = $post;
            $post->setStDeportes($this);
        }

        return $this;
    }

    public function removePost(StPosts $post): self
    {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getStDeportes() === $this) {
                $post->setStDeportes(null);
            }
        }

        return $this;
    }


}

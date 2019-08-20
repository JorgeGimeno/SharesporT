<?php

namespace App\Entity;

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


}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StUsuarios
 *
 * @ORM\Table(name="st_usuarios")
 * @ORM\Entity(repositoryClass="App\Repository\StUsuariosRepository")
 */
class StUsuarios
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nick", type="string", length=50, nullable=false)
     */
    private $nick;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=500, nullable=false)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $mail = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $nombre = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="apellidos", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $apellidos = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ciudad", type="string", length=100, nullable=true, options={"default"="NULL"})
     */
    private $ciudad = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="foto", type="blob", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $foto = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_nac", type="date", nullable=true, options={"default"="NULL"})
     */
    private $fechaNac = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="estado", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $estado = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="permisos", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $permisos = 'NULL';

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getNick(): ?string
    {
        return $this->nick;
    }

    public function setNick(string $nick): self
    {
        $this->nick = $nick;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
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

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(?string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(?string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getFechaNac(): ?\DateTimeInterface
    {
        return $this->fechaNac;
    }

    public function setFechaNac(?\DateTimeInterface $fechaNac): self
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getPermisos(): ?string
    {
        return $this->permisos;
    }

    public function setPermisos(?string $permisos): self
    {
        $this->permisos = $permisos;

        return $this;
    }


}

<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * StUsuarios
 *
 * @ORM\Table(name="st_usuarios")
 * @ORM\Entity(repositoryClass="App\Repository\StUsuariosRepository")
 * UniqueEntity(fields={"mail"}, message="Ya existe una cuenta registrada con este email")
 */
class StUsuarios implements UserInterface
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
     * @var string The hashed password
     *
     * @ORM\Column(name="password", type="string", length=500, nullable=false)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mail", type="string", length=50, nullable=false, unique=true)
     */
    private $mail;

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
    private $fechaNac;

    /**
     * @var string|null
     *
     * @ORM\Column(name="estado", type="string", length=50, nullable=true, options={"default"="NULL"})
     */
    private $estado = 'NULL';

    /**
     * @var string|null 
     *
     * @ORM\Column(name="permisos", type="json", nullable=true, options={"default"="NULL"})
     */
    private $permisos = [];

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StPosts", mappedBy="StUsuarios")
     */
    private $posts;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }


    public function getId(): ?string
    {
        return $this->id;
    }
    /**
     * @see UserInterface
     */
    public function getNick(): ?string
    {
        return $this->nick;
    }

    public function setNick(string $nick): self
    {
        $this->nick = $nick;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    /**
     *
     * @see UserInterface
     */
    public function getUserName(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(?string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getCiudad(): ?string
    {
        return $this->ciudad;
    }

    public function setCiudad(?string $ciudad): self
    {
        $this->ciudad = $ciudad;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto): self
    {
        $this->foto = $foto;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getFechaNac(): ?DateTimeInterface
    {
        return $this->fechaNac;
    }

    public function setFechaNac(?\DateTimeInterface $fechaNac): self
    {
        $this->fechaNac = $fechaNac;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(?string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }
    /**
     * @see UserInterface
     */
    public function getPermisos(): array
    {
        $roles = $this->permisos;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setPermisos(array $permisos): self
    {
        $this->permisos = $permisos;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->permisos;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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
            $post->setStUsuarios($this);
        }

        return $this;
    }

    public function removePost(StPosts $post): self
    {
        if ($this->posts->contains($post)) {
            $this->posts->removeElement($post);
            // set the owning side to null (unless already changed)
            if ($post->getStUsuarios() === $this) {
                $post->setStUsuarios(null);
            }
        }

        return $this;
    }
}

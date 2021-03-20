<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $Login;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $Password;

    /**
     * @ORM\OneToOne(targetEntity=Keys::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_Key;

    /**
     * @ORM\OneToOne(targetEntity=Tariff::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_Tariff;

    /**
     * @ORM\OneToOne(targetEntity=Folder::class, inversedBy="user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_Folder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(string $Login): self
    {
        $this->Login = $Login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getIDKey(): ?Keys
    {
        return $this->ID_Key;
    }

    public function setIDKey(Keys $ID_Key): self
    {
        $this->ID_Key = $ID_Key;

        return $this;
    }

    public function getIDTariff(): ?Tariff
    {
        return $this->ID_Tariff;
    }

    public function setIDTariff(Tariff $ID_Tariff): self
    {
        $this->ID_Tariff = $ID_Tariff;

        return $this;
    }

    public function getIDFolder(): ?Folder
    {
        return $this->ID_Folder;
    }

    public function setIDFolder(Folder $ID_Folder): self
    {
        $this->ID_Folder = $ID_Folder;

        return $this;
    }
}

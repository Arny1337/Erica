<?php

namespace App\Entity;

use App\Repository\FilesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilesRepository::class)
 */
class Files
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $Extension;

    /**
     * @ORM\Column(type="integer")
     */
    private $Size;

    /**
     * @ORM\ManyToOne(targetEntity=Group::class, inversedBy="Files")
     */
    private $ID_group;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Last_Modified;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Last_Access;

    /**
     * @ORM\ManyToOne(targetEntity=Folder::class, inversedBy="Files")
     * @ORM\JoinColumn(nullable=false)
     */
    private $folder;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->Extension;
    }

    public function setExtension(?string $Extension): self
    {
        $this->Extension = $Extension;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->Size;
    }

    public function setSize(int $Size): self
    {
        $this->Size = $Size;

        return $this;
    }

    public function getIDGroup(): ?Group
    {
        return $this->ID_group;
    }

    public function setIDGroup(?Group $ID_group): self
    {
        $this->ID_group = $ID_group;

        return $this;
    }

    public function getLastModified(): ?\DateTimeInterface
    {
        return $this->Last_Modified;
    }

    public function setLastModified(\DateTimeInterface $Last_Modified): self
    {
        $this->Last_Modified = $Last_Modified;

        return $this;
    }

    public function getLastAccess(): ?\DateTimeInterface
    {
        return $this->Last_Access;
    }

    public function setLastAccess(\DateTimeInterface $Last_Access): self
    {
        $this->Last_Access = $Last_Access;

        return $this;
    }

    public function getFolder(): ?Folder
    {
        return $this->folder;
    }

    public function setFolder(?Folder $folder): self
    {
        $this->folder = $folder;

        return $this;
    }
}

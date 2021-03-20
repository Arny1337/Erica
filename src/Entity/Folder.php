<?php

namespace App\Entity;

use App\Repository\FolderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FolderRepository::class)
 */
class Folder
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
    private $Path;

    /**
     * @ORM\Column(type="integer")
     */
    private $Available_Size;

    /**
     * @ORM\OneToMany(targetEntity=Files::class, mappedBy="folder")
     */
    private $Files;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, mappedBy="ID_Folder", cascade={"persist", "remove"})
     */
    private $user;

    public function __construct()
    {
        $this->Files = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->Path;
    }

    public function setPath(string $Path): self
    {
        $this->Path = $Path;

        return $this;
    }

    public function getAvailableSize(): ?int
    {
        return $this->Available_Size;
    }

    public function setAvailableSize(int $Available_Size): self
    {
        $this->Available_Size = $Available_Size;

        return $this;
    }

    /**
     * @return Collection|Files[]
     */
    public function getFiles(): Collection
    {
        return $this->Files;
    }

    public function addFile(Files $file): self
    {
        if (!$this->Files->contains($file)) {
            $this->Files[] = $file;
            $file->setFolder($this);
        }

        return $this;
    }

    public function removeFile(Files $file): self
    {
        if ($this->Files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getFolder() === $this) {
                $file->setFolder(null);
            }
        }

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(Users $user): self
    {
        // set the owning side of the relation if necessary
        if ($user->getIDFolder() !== $this) {
            $user->setIDFolder($this);
        }

        $this->user = $user;

        return $this;
    }
}

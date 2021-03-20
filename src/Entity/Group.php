<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupRepository::class)
 * @ORM\Table(name="`group`")
 */
class Group
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Permissions;

    /**
     * @ORM\OneToMany(targetEntity=Files::class, mappedBy="ID_group")
     */
    private $Files;

    public function __construct()
    {
        $this->Files = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPermissions(): ?int
    {
        return $this->Permissions;
    }

    public function setPermissions(int $Permissions): self
    {
        $this->Permissions = $Permissions;

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
            $file->setIDGroup($this);
        }

        return $this;
    }

    public function removeFile(Files $file): self
    {
        if ($this->Files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getIDGroup() === $this) {
                $file->setIDGroup(null);
            }
        }

        return $this;
    }
}

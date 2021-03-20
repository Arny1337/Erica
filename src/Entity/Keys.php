<?php

namespace App\Entity;

use App\Repository\KeysRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KeysRepository::class)
 * @ORM\Table(name="`keys`")
 */
class Keys
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
    private $Value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->Value;
    }

    public function setValue(string $Value): self
    {
        $this->Value = $Value;

        return $this;
    }
}

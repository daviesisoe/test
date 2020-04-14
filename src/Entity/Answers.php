<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnswersRepository")
 */
class Answers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $reply;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\OneTen", inversedBy="answers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $oneTen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReply(): ?string
    {
        return $this->reply;
    }

    public function setReply(string $reply): self
    {
        $this->reply = $reply;

        return $this;
    }

    public function getOneTen(): ?OneTen
    {
        return $this->oneTen;
    }

    public function setOneTen(?OneTen $oneTen): self
    {
        $this->oneTen = $oneTen;

        return $this;
    }

    public function __toString()
    {
        return $this->reply;
    }
}

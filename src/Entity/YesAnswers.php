<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\YesAnswersRepository")
 */
class YesAnswers
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $no;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\YesNo", inversedBy="yesAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $yesno;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYes(): ?int
    {
        return $this->yes;
    }

    public function setYes(?int $yes): self
    {
        $this->yes = $yes;

        return $this;
    }

    public function getNo(): ?int
    {
        return $this->no;
    }

    public function setNo(?int $no): self
    {
        $this->no = $no;

        return $this;
    }

    public function getYesno(): ?YesNo
    {
        return $this->yesno;
    }

    public function setYesno(?YesNo $yesno): self
    {
        $this->yesno = $yesno;

        return $this;
    }
}

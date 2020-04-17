<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\YesNoRepository")
 */
class YesNo
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
    private $question;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\YesAnswers", mappedBy="yesno", orphanRemoval=true)
     */
    private $yesAnswers;

    public function __construct()
    {
        $this->yesAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * @return Collection|YesAnswers[]
     */
    public function getYesAnswers(): Collection
    {
        return $this->yesAnswers;
    }

    public function addYesAnswer(YesAnswers $yesAnswer): self
    {
        if (!$this->yesAnswers->contains($yesAnswer)) {
            $this->yesAnswers[] = $yesAnswer;
            $yesAnswer->setYesno($this);
        }

        return $this;
    }

    public function removeYesAnswer(YesAnswers $yesAnswer): self
    {
        if ($this->yesAnswers->contains($yesAnswer)) {
            $this->yesAnswers->removeElement($yesAnswer);
            // set the owning side to null (unless already changed)
            if ($yesAnswer->getYesno() === $this) {
                $yesAnswer->setYesno(null);
            }
        }

        return $this;
    }
}

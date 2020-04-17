<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionnaireRepository")
 */
class Questionnaire
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
     * @ORM\OneToMany(targetEntity="App\Entity\QuestionnaireAnswers", mappedBy="qustionnaire", orphanRemoval=true)
     */
    private $questionnaireAnswers;

    public function __construct()
    {
        $this->questionnaireAnswers = new ArrayCollection();
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
     * @return Collection|QuestionnaireAnswers[]
     */
    public function getQuestionnaireAnswers(): Collection
    {
        return $this->questionnaireAnswers;
    }

    public function addQuestionnaireAnswer(QuestionnaireAnswers $questionnaireAnswer): self
    {
        if (!$this->questionnaireAnswers->contains($questionnaireAnswer)) {
            $this->questionnaireAnswers[] = $questionnaireAnswer;
            $questionnaireAnswer->setQustionnaire($this);
        }

        return $this;
    }

    public function removeQuestionnaireAnswer(QuestionnaireAnswers $questionnaireAnswer): self
    {
        if ($this->questionnaireAnswers->contains($questionnaireAnswer)) {
            $this->questionnaireAnswers->removeElement($questionnaireAnswer);
            // set the owning side to null (unless already changed)
            if ($questionnaireAnswer->getQustionnaire() === $this) {
                $questionnaireAnswer->setQustionnaire(null);
            }
        }

        return $this;
    }
}

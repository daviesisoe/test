<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionnaireAnswersRepository")
 */
class QuestionnaireAnswers
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
    private $one;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $two;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $three;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $four;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $five;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $six;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seven;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $eight;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nine;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ten;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Questionnaire", inversedBy="questionnaireAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $qustionnaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOne(): ?int
    {
        return $this->one;
    }

    public function setOne(?int $one): self
    {
        $this->one = $one;

        return $this;
    }

    public function getTwo(): ?int
    {
        return $this->two;
    }

    public function setTwo(?int $two): self
    {
        $this->two = $two;

        return $this;
    }

    public function getThree(): ?int
    {
        return $this->three;
    }

    public function setThree(?int $three): self
    {
        $this->three = $three;

        return $this;
    }

    public function getFour(): ?int
    {
        return $this->four;
    }

    public function setFour(?int $four): self
    {
        $this->four = $four;

        return $this;
    }

    public function getFive(): ?int
    {
        return $this->five;
    }

    public function setFive(?int $five): self
    {
        $this->five = $five;

        return $this;
    }

    public function getSix(): ?int
    {
        return $this->six;
    }

    public function setSix(?int $six): self
    {
        $this->six = $six;

        return $this;
    }

    public function getSeven(): ?int
    {
        return $this->seven;
    }

    public function setSeven(?int $seven): self
    {
        $this->seven = $seven;

        return $this;
    }

    public function getEight(): ?int
    {
        return $this->eight;
    }

    public function setEight(?int $eight): self
    {
        $this->eight = $eight;

        return $this;
    }

    public function getNine(): ?int
    {
        return $this->nine;
    }

    public function setNine(?int $nine): self
    {
        $this->nine = $nine;

        return $this;
    }

    public function getTen(): ?int
    {
        return $this->ten;
    }

    public function setTen(?int $ten): self
    {
        $this->ten = $ten;

        return $this;
    }

    public function getQustionnaire(): ?Questionnaire
    {
        return $this->qustionnaire;
    }

    public function setQustionnaire(?Questionnaire $qustionnaire): self
    {
        $this->qustionnaire = $qustionnaire;

        return $this;
    }
}

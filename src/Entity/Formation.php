<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'array')]
    private $sections = [];

    #[ORM\Column(type: 'array')]
    private $lesson = [];

    #[ORM\Column(type: 'object')]
    private $video;

    #[ORM\Column(type: 'string', length: 500)]
    private $explication;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSections(): ?array
    {
        return $this->sections;
    }

    public function setSections(array $sections): self
    {
        $this->sections = $sections;

        return $this;
    }

    public function getLesson(): ?array
    {
        return $this->lesson;
    }

    public function setLesson(array $lesson): self
    {
        $this->lesson = $lesson;

        return $this;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function setVideo($video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getExplication(): ?string
    {
        return $this->explication;
    }

    public function setExplication(string $explication): self
    {
        $this->explication = $explication;

        return $this;
    }
}

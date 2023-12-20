<?php

namespace App\Models;

use App\Core\Model;

class Review extends Model
{
    protected ?int $id = null;
    protected ?string $author;
    protected ?int $id_character = null;
    protected ?int $grade = null;
    protected ?string $text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function getIdCharacter(): ?int
    {
        return $this->id_character;
    }

    public function setIdCharacter(?int $id_character): void
    {
        $this->id_character = $id_character;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(?int $grade): void
    {
        $this->grade = $grade;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }


}
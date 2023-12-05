<?php

namespace App\Models;

use App\Core\Model;

class GalleryPictures extends Model
{
    protected ?int $id;
    protected ?int $id_character;
    protected ?int $id_column;
    protected ?string $picture;

    /**
     * @param int|null $id_character
     * @param int|null $column
     * @param string|null $picture
     */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getIdCharacter(): ?int
    {
        return $this->id_character;
    }

    public function setIdCharacter(?int $id_character): void
    {
        $this->id_character = $id_character;
    }

    public function getIdColumn(): ?int
    {
        return $this->id_column;
    }

    public function setIdColumn(?int $id_column): void
    {
        $this->id_column = $id_column;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

}
<?php

namespace App\Models;

use App\Core\Model;
class Character extends Model
{
    protected ?int $id = null;
    protected ?string $author;
    protected ?string $name;
    protected ?string $quote;
    protected ?string $picture;
    protected ?string $fullname;
    protected ?string $surname;
    protected ?string $knowas;
    protected ?string $gender;
    protected ?string $birthday;
    protected ?string $birthplace;
    protected ?string $heigth;
    protected ?string $weigth;
    protected ?string $occupation;
    protected ?string $status;

    public function getKnowas(): ?string
    {
        return $this->knowas;
    }

    public function setKnowas(?string $knowas): void
    {
        $this->knowas = $knowas;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): void
    {
        $this->gender = $gender;
    }

    public function getBirthday(): ?string
    {
        return $this->birthday;
    }

    public function setBirthday(?string $birthday): void
    {
        $this->birthday = $birthday;
    }

    public function getBirthplace(): ?string
    {
        return $this->birthplace;
    }

    public function setBirthplace(?string $birthplace): void
    {
        $this->birthplace = $birthplace;
    }

    public function getHeigth(): ?string
    {
        return $this->heigth;
    }

    public function setHeigth(?string $heigth): void
    {
        $this->heigth = $heigth;
    }

    public function getWeigth(): ?string
    {
        return $this->weigth;
    }

    public function setWeigth(?string $weigth): void
    {
        $this->weigth = $weigth;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(?string $occupation): void
    {
        $this->occupation = $occupation;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }


    public function getQuote(): ?string
    {
        return $this->quote;
    }

    public function setQuote(?string $quote): void
    {
        $this->quote = $quote;
    }


    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(?string $fullname): void
    {
        $this->fullname = $fullname;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }


    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): void
    {
        $this->picture = $picture;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setStringValueFromName($valueParam, $value) {
        $dictionary = array(
            "fullname" => "setFullname",
            "name" => "setName",
            "surname" => "setSurname",
            "quote" => "setQuote",
            "knowas" => "setKnowas",
            "gender" => "setGender",
            "birthday" => "setBirthday",
            "birthplace" => "setBirthplace",
            "heigth" => "setHeigth",
            "weigth" => "setWeigth",
            "occupation" => "setOccupation",
            "status" => "setStatus",
        );

        if (isset($dictionary[$valueParam]) && method_exists($this, $dictionary[$valueParam])) {
            $this->{$dictionary[$valueParam]}($value);
        }
    }

    public static function isValueParamCanBeNull($valueParam) : bool {
        $dictionary = ["name", "quote"];

        return array_key_exists($valueParam, $dictionary);
    }
}
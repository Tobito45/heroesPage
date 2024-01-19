<?php
/** @var \App\Core\LinkGenerator $link */

use App\Models\Character;

?>

<head>
    <link rel="stylesheet" href="/public/css/characters/characterslist.css">
</head>

<div class="characters">
    <div>
        <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . Character::getOne(1)->getPicture()?>" alt="Character1">
        <p><?= Character::getOne(1)->getName() ?></p>
        <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="<?= $link->url("characters.characterPage", ["character" => 1]) ?>">Read more -></a></p>
    </div>

    <div>
        <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . Character::getOne(2)->getPicture()?>" alt="Character2">
        <p><?= Character::getOne(2)->getName() ?></p>
        <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="<?= $link->url("characters.characterPage", ["character" => 2]) ?>">Read more -></a></p>
    </div>
    <div>
        <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . Character::getOne(3)->getPicture()?>" alt="Character3">
        <p><?= Character::getOne(3)->getName() ?></p>
        <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="<?= $link->url("characters.characterPage", ["character" => 3]) ?>">Read more -></a></p>
    </div>
    <div>
        <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . Character::getOne(4)->getPicture()?>" alt="Character4">
        <p><?= Character::getOne(4)->getName() ?></p>
        <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="<?= $link->url("characters.characterPage", ["character" => 4]) ?>">Read more -></a></p>
    </div>

</div>

<div class="buttonAllHeroes">
    <button type="button" class=" btn btn-success"
            onclick="window.location.href='<?= $link->url("characters.characterAll") ?>'">
        See all heroes
    </button>
</div>

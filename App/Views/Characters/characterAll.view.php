<?php
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */


    $heroes = \App\Models\Character::getAll();
?>

<head>
    <link rel="stylesheet" href="/public/css/characters/characterslist.css">
    <link rel="stylesheet" href="/public/css/characters/characterall.css">
</head>
<div class="characters">
    <?php
    $size = sizeof($heroes);
    $size += 4 - $size % 4;
    for($i = 0; $i < $size; $i++) {
        if($i < sizeof($heroes)) {?>
            <div>
                <img src="<?php
                if(str_contains($heroes[$i]->getPicture(), "/")) {
                    echo  $heroes[$i]->getPicture();
                }else {
                    echo   \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $heroes[$i]->getPicture();
                }
                ?>"
                     alt="Character1">

                <p><?= $heroes[$i]->getName()?></p>

                <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="<?= $link->url("characters.characterPage", ["character" => $heroes[$i]->getId()]) ?>" >See page -></a></p>
                <a data-delete="<?= $heroes[$i]->getId() ?>" class="link-light link-opacity-75-hover delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg></a>
            </div>
        <?php } else {?>
            <div>
                <img class="didntExistImage" src="public/img/charactersPage/didntexist.png">
                <p>Your new hero!</p>
                <p><a class="link-opacity-75 link-opacity-75-hover link-success didntExist" href="<?= $auth->isLogged() ? $link->url("account.index") : $link->url("auth.index") ?>">There can be your hero!</a></p>
            </div>
        <?php }?>
    <?php }?>

</div>
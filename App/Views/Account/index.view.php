<?php
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */ ?>
<head>
    <link rel="stylesheet" href="/public/css/adminpage.css">
    <link rel="stylesheet" href="/public/css/charactersList.css">
    <link rel="stylesheet" href="/public/css/form.css">
    <script type="module" src="/public/js/selectName/AccountButtons.js"></script>


</head>
<div class="askPanel" id="askPanel" style="display: none">
    <div class=" parentLoginPanel">
        <div class="card-body rounded-1">
            <h1 class="text-center">Write name of your hero</h1>
            <div class="form-label-group mb-3">
                <input name="login" type="text" id="nameInput" class="form-control" placeholder="Name"
                       required autofocus>
            </div>

            <div class="buttonsName">
                <button id="nameClose"  class="btn btn-danger" name="close">Cancel
                    </button>
                <button id="nameSubmit"  class="btn btn-success" name="submit">Confirm
                    </button>
            </div>
        </div>
    </div>
</div>

<div class="loginInfo">
    <div>
        <h1 class="">Welcome back <?= $auth->getLoggedUserName()?>!</h1>
        <h1>Your heroes:</h1>
    </div>
</div>
<?php
    /** @var \App\Core\LinkGenerator $link */
    $user = \App\Models\User::getAll("name = ? ", [$auth->getLoggedUserName()]);
    $heroes = null;
    if($user[0]->getRole() != "admin") {
        $heroes = \App\Models\Character::getAll("author = ?", [$auth->getLoggedUserName()]);
    } else {
        $heroes = \App\Models\Character::getAll();
    }
    ?>

<div id="addCharacter" data-action="<?= $link->url("characters.characterPage") ?>"></div>
<div id="changeCharacter" data-action="<?= $link->url("account.index") ?>"></div>

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
                    <p><a class="link-opacity-75 link-opacity-75-hover link-success didntExist" href="#">Add new hero -></a></p>
                </div>
        <?php }?>
    <?php }?>

</div>
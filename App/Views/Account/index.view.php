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
    <div>
        <button class="btn btn-success buttonLogOut"><a href="<?=$link->url("auth.logout")?>">Log out</a></button>
    </div>
</div>
<?php
    /** @var \App\Core\LinkGenerator $link */

    $heroes = \App\Models\Character::getAll("author = ?", [$auth->getLoggedUserName()]);
?>

<div id="addCharacter" data-action="<?= $link->url("characters.characterPage") ?>"></div>

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
                    <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="#">See page -></a></p>
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
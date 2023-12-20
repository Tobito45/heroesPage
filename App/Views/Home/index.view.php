<?php
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */

?>

<head>
    <link rel="stylesheet" href="/public/css/homepage.css">
</head>
<div class="textOfMainPage rounded-5">
    <h1 class="text-white">Heroes page!</h1>
    <p class="text-white">
        This page contains many different heroes from all universes!
        Here you can add your favourite character, add information about him and add pictures of him.
        You can also check out other popular characters created by other users!</p>
</div>
<div class="buttonAddYouHero">
    <button type="button" class=" btn btn-success" onclick="window.location.href='<?= $auth->isLogged() ? $link->url("account.index")
                                                                : $link->url("auth.index") ?>'">Add your Hero -></button>
</div>
<div class="quote rounded-5">
    <img class="circle-image" src="/public/img/Iroh.jpg" alt="Iroh"/>
    <div>
        <p>“It is important to draw wisdom from many different places.
            If we take it from only one place, it becomes rigid and stale.
            Understanding others, the other elements, and the other nations will help you become whole.”
        </p>
        <p>(c) Uncle Iroh</p>
    </div>
</div>


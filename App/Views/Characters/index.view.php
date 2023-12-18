<?php
/** @var \App\Core\LinkGenerator $link */

use App\Models\Character;

?>

<head>
    <link rel="stylesheet" href="/public/css/characterpage.css">
    <link rel="stylesheet" href="/public/css/charactersList.css">

    <script src="/public/splide-4.1.3/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="/public/splide-4.1.3/dist/css/splide.min.css">
</head>
<div class="characters">
    <div>
        <img src="public/img/charactersPage/IronMan.png" alt="Character1">
        <p><?= Character::getOne(1)->getName() ?></p>
        <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="<?= $link->url("characters.characterPage", ["character" => 1]) ?>">Read more -></a></p>
    </div>

    <div>
        <img src="public/img/charactersPage/ChainsawMan.png" alt="Character2">
        <p><?= Character::getOne(2)->getName() ?></p>
        <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="<?= $link->url("characters.characterPage", ["character" => 2]) ?>">Read more -></a></p>
    </div>
    <div>
        <img src="public/img/charactersPage/Junkrat.png" alt="Character3">
        <p><?= Character::getOne(3)->getName() ?></p>
        <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="<?= $link->url("characters.characterPage", ["character" => 3]) ?>">Read more -></a></p>
    </div>
    <div>
        <img src="public/img/charactersPage/Iroh.png" alt="Character4">
        <p><?= Character::getOne(4)->getName() ?></p>
        <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="<?= $link->url("characters.characterPage", ["character" => 4]) ?>">Read more -></a></p>
    </div>

</div>

<div class="textCharacters charactersSliders">
    <h1 >Popular characters</h1>
    <h1 class="disableOnMobil">New characters</h1>
</div>
<div class="charactersSliders">
    <section id="image-carouselPopular" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img class="rounded-2" src="/public/img/charactersPictures/Illidan.jpeg" alt="test1">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Illidan Stormrage</button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Read more -></button>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <img class="rounded-2" src="/public/img/charactersPictures/levi.jpg" alt="test2">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Levi Ackerman</button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Read more -></button>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <img class="rounded-2" src="/public/img/charactersPictures/creeper.png" alt="test3">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Creeper</button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class="btn btn-success">Read more -></button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <div class="textCharacters charactersSliders enableOnMobile">
        <h1>New characters</h1>
    </div>
    <section id="image-carouselNew" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img class="rounded-2" src="/public/img/charactersPictures/spiderMan.jpg" alt="test1">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Spider Man</button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Read more -></button>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <img class="rounded-2" src="/public/img/charactersPictures/deidara.png" alt="test2">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Deidara</button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Read more -></button>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <img class="rounded-2" src="/public/img/charactersPictures/gojo.jpg" alt="test3">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success">Gojo Satoru</button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class="btn btn-success">Read more -></button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
</div>
<script>
    new Splide( '#image-carouselPopular' ).mount();
</script>
<script>
    new Splide( '#image-carouselNew' ).mount();
</script>
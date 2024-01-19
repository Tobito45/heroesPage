<?php
/** @var \App\Core\LinkGenerator $link */

use App\Models\Character;

?>

<head>
    <link rel="stylesheet" href="/public/css/characters/characterpage.css">

    <script src="/public/splide-4.1.3/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="/public/splide-4.1.3/dist/css/splide.min.css">
</head>

<?php require 'charactersList.view.php' ?>

<?php
    $popularCharacters = Character::getAll();
    $gradeValues = [];
    $newPopularCharacters = [];
    foreach ($popularCharacters as $character) {
        if(count(\App\Models\GalleryPictures::getAll("id_character = ?", [$character->getId()])) == 0)
            continue;

        $grade = 0;
        $allReviews = \App\Models\Review::getAll("id_character = ?", [$character->getId()]);
        foreach ($allReviews as $review) {
            $grade += $review->getGrade();
        }
        if(count($allReviews) != 0)
            $grade = $grade/count($allReviews);
        $gradeValues[] = $grade;
    }

    rsort($gradeValues);

    $topThree = array_slice($gradeValues, 0, 3);

    foreach ($popularCharacters as $character) {
        if(count(\App\Models\GalleryPictures::getAll("id_character = ?", [$character->getId()])) == 0)
            continue;

        $grade = 0;
        $allReviews = \App\Models\Review::getAll("id_character = ?", [$character->getId()]);
        foreach ($allReviews as $review) {
            $grade += $review->getGrade();
        }
        if(count($allReviews) != 0)
            $grade = $grade/count($allReviews);

        if (in_array($grade, $topThree)) {
            $key = array_search($grade, $topThree);
            unset($topThree[$key]);
            $newPopularCharacters[] = $character;
        }
    }

?>
<div class="textCharacters charactersSliders">
    <h1 >Popular characters</h1>
    <h1 class="disableOnMobil">New characters</h1>
</div>
<div class="charactersSliders">
    <section id="image-carouselPopular" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img class="rounded-2" src="<?php
                        $getImages = \App\Models\GalleryPictures::getAll("id_character = ?", [$newPopularCharacters[0]->getId()]);
                        $randomKey = array_rand($getImages);
                        echo \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $getImages[$randomKey]->getPicture();
                    ?>" alt="test1">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success"
                                    onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newPopularCharacters[0]->getId()]) ?>'">
                                <?= $newPopularCharacters[0]->getName() ?></button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success" onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newPopularCharacters[0]->getId()]) ?>'">
                                    Read more -></button>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <img class="rounded-2" src="<?php
                        $getImages = \App\Models\GalleryPictures::getAll("id_character = ?", [$newPopularCharacters[1]->getId()]);
                        $randomKey = array_rand($getImages);
                        echo \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $getImages[$randomKey]->getPicture();
                    ?>" alt="test2">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success"
                                    onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newPopularCharacters[1]->getId()]) ?>'">
                                <?= $newPopularCharacters[1]->getName() ?></button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success" onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newPopularCharacters[1]->getId()]) ?>'">
                                Read more -></button>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <img class="rounded-2" src="<?php
                        $getImages = \App\Models\GalleryPictures::getAll("id_character = ?", [$newPopularCharacters[2]->getId()]);
                        $randomKey = array_rand($getImages);
                        echo \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $getImages[$randomKey]->getPicture();
                    ?>" alt="test3">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success"
                                    onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newPopularCharacters[2]->getId()]) ?>'">
                                <?= $newPopularCharacters[2]->getName() ?></button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success" onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newPopularCharacters[2]->getId()]) ?>'">
                                Read more -></button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
<?php
    $charactersWithMaxId = Character::getAll(null,[],"id DESC");
    $newCharacters = [];
    foreach ($charactersWithMaxId as $character) {
        if(count(\App\Models\GalleryPictures::getAll("id_character = ?", [$character->getId()])) > 0) {
            $newCharacters[] = $character;
        }

        if(count($newCharacters) >= 3)
            break;
    }
?>
    <div class="textCharacters charactersSliders enableOnMobile">
        <h1>New characters</h1>
    </div>
    <section id="image-carouselNew" class="splide" aria-label="Beautiful Images">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img class="rounded-2" src="<?php
                        $getImages = \App\Models\GalleryPictures::getAll("id_character = ?", [$newCharacters[0]->getId()]);
                        $randomKey = array_rand($getImages);
                        echo \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $getImages[$randomKey]->getPicture();
                    ?>" alt="test3">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success"
                                    onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newCharacters[0]->getId()]) ?>'">
                                <?= $newCharacters[0]->getName() ?></button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success" onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newCharacters[0]->getId()]) ?>'">
                                Read more -></button>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <img class="rounded-2" src="<?php
                        $getImages = \App\Models\GalleryPictures::getAll("id_character = ?", [$newCharacters[1]->getId()]);
                        $randomKey = array_rand($getImages);
                        echo \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $getImages[$randomKey]->getPicture();
                    ?>" alt="test3">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success"
                                    onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newCharacters[1]->getId()]) ?>'">
                                <?= $newCharacters[1]->getName() ?></button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success" onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newCharacters[1]->getId()]) ?>'">
                                Read more -></button>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <img class="rounded-2" src="<?php
                        $getImages = \App\Models\GalleryPictures::getAll("id_character = ?", [$newCharacters[2]->getId()]);
                        $randomKey = array_rand($getImages);
                        echo \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $getImages[$randomKey]->getPicture();
                        ?>" alt="test3">
                    <div class="slider__item__div">
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success"
                                    onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newCharacters[2]->getId()]) ?>'">
                                <?= $newCharacters[2]->getName() ?></button>
                        </div>
                        <div class="buttonAddYouHero">
                            <button type="button" class=" btn btn-success" onclick="window.location.href='<?= $link->url("characters.characterPage", ["character" => $newCharacters[2]->getId()]) ?>'">
                                Read more -></button>
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
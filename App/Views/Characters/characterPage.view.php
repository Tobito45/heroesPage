<?php

/** @var Array $data */
/** @var \App\Models\Post $character */
/** @var App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */

use App\Models\Character;
use App\Models\User;

$userRole = User::getAll("name = ?", [$this->app->getAuth()->getLoggedUserName()])[0]->getRole();
?>
<head>
    <link rel="stylesheet" href="/public/css/characters/characterinfo.css">
    <link rel="stylesheet" href="/public/css/characters/characterslist.css">

    <script>
        const characterId = <?php echo $data["character"]->getId(); ?>;
    </script>
    <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
        <script type="module" src="/public/js/EditButton.js"></script>
    <?php else: ?>
    <script type="module" src="/public/js/review/ReviewCreate.js"></script>
    <?php endif?>


</head>
<div class="textName">
    <div id="edit1" data-value = "name" data-is-not-null = "true">
        <h1 id="text1" > <?=$data["character"]->getName() ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
            <a id="button1" class=" link-light link-opacity-75-hover"><i class="bi bi-pencil-square " style="font-size: 0.65em"></i></a>
            <?php endif; ?>
        </h1>
        <?php
            $reviews = \App\Models\Review::getAll("id_character = ?",[$data["character"]->getId()]);
            $grade = 0;
            foreach ($reviews as $review) {
                $grade += $review->getGrade();
            }
            if(count($reviews) != 0)
                $grade = $grade/count($reviews);

          if($grade != 0):
        ?>
        <h5><?= round($grade, 1)?>/5 <i class="bi bi-star"></i></h5>
        <?php endif; ?>
    </div>
    <div id="textAreaEdit1" data-value = "quote" data-is-not-null = "true">
        <p id="textArea1"> <?=$data["character"]->getQuote() ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
            <a id="buttonArea1" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></a>
            <?php endif; ?>
        </p>
    </div>

</div>
<div class="heroImageAndInfo">
    <div class="heroImage">
        <img id="imageShow1" src="<?php
                  if(str_contains($data["character"]->getPicture(), "/")) {
                      echo  $data["character"]->getPicture();
                  }else {
                      echo   \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $data["character"]->getPicture();
                 }
        ?>"
             class="img-fluid alt="Character2">
        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
            <form  enctype="multipart/form-data">
                <input  id="formImage1" type="file" name='picture'   accept="image/*">
            </form>
        <?php endif; ?>
    </div>
    <table class="heroInfo">
        <tr>
            <td><p>Name</p></td>
            <td>
                <div id="edit3" data-value = "fullname" data-is-not-null = "false">
                    <p id="text3"> <?=$data["character"]->getFullName() ?>
                        <?php if($auth->isLogged() &&  ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                        <a id="button3" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></a></p>
                        <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Surname</p></td>
            <td>
                <div id="edit4" data-value = "surname" data-is-not-null = "false">
                    <p id="text4"> <?=$data["character"]->getSurName() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                        <a id="button4" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></a></p>
                      <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Also know as</p></td>
            <td>
                <div id="edit5" data-value = "knowas" data-is-not-null = "false">
                    <p id="text5"><?=$data["character"]->getKnowas() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                        <a id="button5" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></a></p>
                      <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Gender</p></td>
            <td>
                <div id="edit6" data-value = "gender" data-is-not-null = "false">
                    <p id="text6"> <?=$data["character"]->getGender() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                        <a id="button6" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></a></p>
                      <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Date 0f Birth</p></td>
            <td>
                <div id="edit7" data-value = "birthday" data-is-not-null = "false">
                    <p id="text7"> <?=$data["character"]->getBirthday() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                        <a id="button7" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></a></p>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Birthplace</p></td>
            <td>
                <div id="edit8" data-value = "birthplace" data-is-not-null = "false">
                    <p id="text8">  <?=$data["character"]->getBirthplace() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                        <a id="button8" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></a></p>
                        <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Height</p></td>
            <td>
                <div id="edit9" data-value = "heigth" data-is-not-null = "false">
                    <p id="text9">  <?=$data["character"]->getHeigth() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                        <a id="button9" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></a></p>
                        <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Weight</p></td>
            <td>
                <div id="edit10" data-value = "weigth" data-is-not-null = "false">
                    <p id="text10">  <?=$data["character"]->getWeigth() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                        <a id="button10" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></p>
                        <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Occupation</p></td>
            <td>
                <div id="edit11" data-value = "occupation" data-is-not-null = "false">
                    <p id="text11"><?=$data["character"]->getOccupation() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                            <a id="button11" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></p>
                      <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Status</p></td>
            <td>
                <div id="edit12"  data-value = "status" data-is-not-null = "false">
                    <p id="text12"> <?=$data["character"]->getStatus() ?>   
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                        <a id="button12" class="link-light link-opacity-75-hover"><i class="bi bi-pencil-square"></i></p>
                    <?php endif; ?>
                </div>
        </tr>
    </table>
</div>
<div class="Gallery">
    <h1>Gallery</h1>
    <!-- Gallery -->
    <div class="row">
        <div id="gallery1" class="col-lg-4 col-md-12 mb-4 mb-lg-0">

            <?php $picturesColumn = \App\Models\GalleryPictures::getAll("id_character = ? AND id_column = ?", [$data["character"]->getId(), '1']);
                foreach ($picturesColumn as $picture):  ?>

                    <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                <a class="link-light link-opacity-75-hover"><i class="bi bi-trash"></i></a>
                    <?php endif; ?>
                <img
                            src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $picture->getPicture()?>"
                            class="w-100 shadow-1-strong rounded mb-4"
                            data-picture-id="<?= $picture->getId() ?>"
                />
                <?php endforeach; ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                <form id="galleryColumn1" action='<?=$link->url('characters.addPictureToGallery', ['id' => $data["character"]->getId(), 'column' => '1']) ?>' method='post' enctype="multipart/form-data">
                    <input id="galleryAddButton1" type="file" name='gallery1'  accept="image/*">
                </form>
            <?php endif; ?>
        </div>

        <div id="gallery2" class="col-lg-4 mb-4 mb-lg-0">
            <?php $picturesColumn = \App\Models\GalleryPictures::getAll("id_character = ? AND id_column = ?", [$data["character"]->getId(), '2']);
            foreach ($picturesColumn as $picture):  ?>

                <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                <a class="link-light link-opacity-75-hover"><i class="bi bi-trash"></i></a>
                <?php endif; ?>
                <img
                        src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $picture->getPicture()?>"
                        class="w-100 shadow-1-strong rounded mb-4"
                        data-picture-id="<?= $picture->getId() ?>"
                />
            <?php endforeach; ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                <form id="galleryColumn2" action='<?=$link->url('characters.addPictureToGallery', ['id' => $data["character"]->getId(), 'column' => '2']) ?>' method='post' enctype="multipart/form-data">
                    <input id="galleryAddButton2" type="file" name='gallery2'  accept="image/*">
                </form>
            <?php endif; ?>
        </div>

        <div id="gallery3" class="col-lg-4 mb-4 mb-lg-0">
            <?php $picturesColumn = \App\Models\GalleryPictures::getAll("id_character = ? AND id_column = ?", [$data["character"]->getId(), '3']);
            foreach ($picturesColumn as $picture):  ?>

            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                <a class="link-light link-opacity-75-hover"><i class="bi bi-trash"></i></a>
                <?php endif; ?>
                <img
                        src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $picture->getPicture()?>"
                        class="w-100 shadow-1-strong rounded mb-4"
                        data-picture-id="<?= $picture->getId() ?>"
                />
            <?php endforeach; ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $userRole == "admin")): ?>
                <form id="galleryColumn3" action='<?=$link->url('characters.addPictureToGallery', ['id' => $data["character"]->getId(), 'column' => '3']) ?>' method='post' enctype="multipart/form-data">
                    <input id="galleryAddButton3" type="file" name='gallery3'  accept="image/*">
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Gallery -->
<div class="Gallery">
    <h1>Other Heroes</h1>
    <?php require 'charactersList.view.php' ?>
</div>
<?php
    $getReviews = \App\Models\Review::getAll("id_character = ?", [$data["character"]->getId()]);
?>

<div class="Reviews">
    <h1>Reviews</h1>
    <?php foreach ($getReviews as $review) {
        if($auth->isLogged() && $review->getAuthor() == $auth->getLoggedUserName()) {
            continue;
        }
        ?>
        <div class="parentDiv">
            <div class="autorReview">
                <h3 class="nameAuthor"><?= $review->getAuthor() ?></h3>
                <div class="gradeDiv">
                <?php if($auth->isLogged() && $userRole == "admin") : ?>
                    <a class="link-light link-opacity-75-hover"><i class="bi bi-trash deleteReview"></i></a>
                <?php endif; ?>
                <h3> <?= $review->getGrade() ?>/5</h3>
                </div>
            </div>
            <p class="textReview"><?= $review->getText() ?></p>
        </div>
    <?php } ?>

    <?php
        $review = null;
        if ($auth->isLogged() && $auth->getLoggedUserName() != $data["character"]->getAuthor() && $userRole != "admin"):
            if(count(\App\Models\Review::getAll("id_character = ? AND author = ?", [$data["character"]->getId(), $auth->getLoggedUserName()])) > 0) {
                $review = \App\Models\Review::getAll("id_character = ? AND author = ?", [$data["character"]->getId(), $auth->getLoggedUserName()])[0];
            }
    ?>
    <div>
        <div id="mainReview" class="autorReview">
            <h3 class="nameAuthor"><?= $auth->getLoggedUserName() ?></h3>

            <h3>
                <input id="inputGrade" class="grade" type="number" min="1" max="5" value="<?php if($review != null) echo $review->getGrade();
                                                                                                    else echo 1; ?>">/5
                <a class="link-light link-opacity-75-hover">
                    <i class="bi bi-trash deleteReview" style="font-size: 0.65em"></i>
                </a>
            </h3>
        </div>

        <p class="textReview "><textarea class="areaReview" id="areaReview" rows="4"  ><?php if($review != null) echo $review->getText();
                else echo ""; ?></textarea></p>
        <div class="reviewButtons">
            <button id="buttonSubmitReview" class="btn btn-success">Submit</button>
            <h5 id="confirmReview">Review was saved</h5>
            <h5 id="removeReview">Review was removed</h5>
        </div>
    </div>
    <?php endif; ?>
</div>
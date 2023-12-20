<?php

/** @var Array $data */
/** @var \App\Models\Post $character */
/** @var App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */

use App\Models\Character;

   // $character = Character::getOne($data["character"]);
?>
<head>
    <link rel="stylesheet" href="/public/css/characterinfo.css">
    <link rel="stylesheet" href="/public/css/charactersList.css">

    <script>
        const characterId = <?php echo $data["character"]->getId(); ?>;
    </script>
    <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
        <script type="module" src="/public/js/EditButton.js"></script>
    <?php else: ?>
    <script type="module" src="/public/js/review/ReviewCreater.js"></script>
    <?php endif?>


</head>
<div class="textName">
    <div id="edit1" data-value = "name" data-is-not-null = "true">
        <h1 id="text1" > <?=$data["character"]->getName() ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
            <a id="button1" class=" link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg></a>
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
        <h5><?= round($grade, 1)?>/5<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
            </svg>
        </h5>
        <?php endif; ?>
    </div>
    <div id="textAreaEdit1" data-value = "quote" data-is-not-null = "true">
        <p id="textArea1"> <?=$data["character"]->getQuote() ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
            <a id="buttonArea1" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg></a>
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
        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
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
                        <?php if($auth->isLogged() &&  ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button3" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                        <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Surname</p></td>
            <td>
                <div id="edit4" data-value = "surname" data-is-not-null = "false">
                    <p id="text4"> <?=$data["character"]->getSurName() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button4" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                      <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Also know as</p></td>
            <td>
                <div id="edit5" data-value = "knowas" data-is-not-null = "false">
                    <p id="text5"><?=$data["character"]->getKnowas() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button5" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                      <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Gender</p></td>
            <td>
                <div id="edit6" data-value = "gender" data-is-not-null = "false">
                    <p id="text6"> <?=$data["character"]->getGender() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button6" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                      <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Date 0f Birth</p></td>
            <td>
                <div id="edit7" data-value = "birthday" data-is-not-null = "false">
                    <p id="text7"> <?=$data["character"]->getBirthday() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button7" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Birthplace</p></td>
            <td>
                <div id="edit8" data-value = "birthplace" data-is-not-null = "false">
                    <p id="text8">  <?=$data["character"]->getBirthplace() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button8" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                        <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Height</p></td>
            <td>
                <div id="edit9" data-value = "heigth" data-is-not-null = "false">
                    <p id="text9">  <?=$data["character"]->getHeigth() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button9" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                        <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Weight</p></td>
            <td>
                <div id="edit10" data-value = "weigth" data-is-not-null = "false">
                    <p id="text10">  <?=$data["character"]->getWeigth() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button10" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                        <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Occupation</p></td>
            <td>
                <div id="edit11" data-value = "occupation" data-is-not-null = "false">
                    <p id="text11"><?=$data["character"]->getOccupation() ?>
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button11" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                      <?php endif; ?>
                </div>
            </td>
        </tr>
        <tr>
            <td><p>Status</p></td>
            <td>
                <div id="edit12"  data-value = "status" data-is-not-null = "false">
                    <p id="text12"> <?=$data["character"]->getStatus() ?>   
                        <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                        <a id="button12" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
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

                    <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                <a class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg></a>
                    <?php endif; ?>
                <img
                            src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $picture->getPicture()?>"
                            class="w-100 shadow-1-strong rounded mb-4"
                            data-picture-id="<?= $picture->getId() ?>"
                />
                <?php endforeach; ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                <form id="galleryColumn1" action='<?=$link->url('characters.addPictureToGallery', ['id' => $data["character"]->getId(), 'column' => '1']) ?>' method='post' enctype="multipart/form-data">
                    <input id="galleryAddButton1" type="file" name='gallery1'  accept="image/*">
                </form>
            <?php endif; ?>
        </div>

        <div id="gallery2" class="col-lg-4 mb-4 mb-lg-0">
            <?php $picturesColumn = \App\Models\GalleryPictures::getAll("id_character = ? AND id_column = ?", [$data["character"]->getId(), '2']);
            foreach ($picturesColumn as $picture):  ?>

                <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                <a class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg></a>
                <?php endif; ?>
                <img
                        src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $picture->getPicture()?>"
                        class="w-100 shadow-1-strong rounded mb-4"
                        data-picture-id="<?= $picture->getId() ?>"
                />
            <?php endforeach; ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                <form id="galleryColumn2" action='<?=$link->url('characters.addPictureToGallery', ['id' => $data["character"]->getId(), 'column' => '2']) ?>' method='post' enctype="multipart/form-data">
                    <input id="galleryAddButton2" type="file" name='gallery2'  accept="image/*">
                </form>
            <?php endif; ?>
        </div>

        <div id="gallery3" class="col-lg-4 mb-4 mb-lg-0">
            <?php $picturesColumn = \App\Models\GalleryPictures::getAll("id_character = ? AND id_column = ?", [$data["character"]->getId(), '3']);
            foreach ($picturesColumn as $picture):  ?>

            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
                <a class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg></a>
                <?php endif; ?>
                <img
                        src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $picture->getPicture()?>"
                        class="w-100 shadow-1-strong rounded mb-4"
                        data-picture-id="<?= $picture->getId() ?>"
                />
            <?php endforeach; ?>
            <?php if($auth->isLogged() && ($data["character"]->getAuthor() == $auth->getLoggedUserName() || $auth->getLoggedUserName() == "admin")): ?>
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
                <?php if($auth->isLogged() && $auth->getLoggedUserName() == "admin") : ?>
                <a class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash deleteReview" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg></a>
                <?php endif; ?>
                <h3> <?= $review->getGrade() ?>/5</h3>
                </div>
            </div>
            <p class="textReview"><?= $review->getText() ?></p>
        </div>
    <?php } ?>

    <?php
        $review = null;
        if ($auth->isLogged() && $auth->getLoggedUserName() != $data["character"]->getAuthor() && $auth->getLoggedUserName() != "admin"):
            if(count(\App\Models\Review::getAll("id_character = ? AND author = ?", [$data["character"]->getId(), $auth->getLoggedUserName()])) > 0) {
                $review = \App\Models\Review::getAll("id_character = ? AND author = ?", [$data["character"]->getId(), $auth->getLoggedUserName()])[0];
            }
    ?>
    <div>
        <div class="autorReview">
            <h3><?= $auth->getLoggedUserName() ?></h3>
            <h3> <input id="inputGrade" class="grade" type="number" min="1" max="5" value="<?php if($review != null) echo $review->getGrade();
                                                                                                    else echo 1; ?>">/5</h3>
        </div>
        <p class="textReview "><textarea class="areaReview" id="areaReview" rows="4"  ><?php if($review != null) echo $review->getText();
                else echo ""; ?></textarea></p>
        <div class="reviewButtons">
            <button id="buttonSubmitReview" class="btn btn-success">Submit</button>
            <h5 id="confirmReview">Review was saved...</h5>
        </div>
    </div>
    <?php endif; ?>
</div>
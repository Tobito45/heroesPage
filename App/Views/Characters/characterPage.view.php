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
    <script type="module" src="/public/js/EditButton.js"></script>
</head>
<div class="textName">
    <div id="edit1" data-value = "name" data-is-not-null = "true">
        <h1 id="text1" > <?=$data["character"]->getName() ?>
            <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
            <a id="button1" class=" link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class=" bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg></a>
            <?php endif; ?>
        </h1>
    </div>
    <div id="edit2" data-value = "quote" data-is-not-null = "true">
        <p id="text2"> <?=$data["character"]->getQuote() ?>
            <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
            <a id="button2" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
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
        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
                        <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
                        <a id="button12" class="link-light link-opacity-75-hover"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg></a></p>
                    <?php endif; ?>
                </div>
        </tr>
    </table>
</div>

<!--<div class="Capitol" id="Capitol1">
    <div class="CapitolHeader" id="edit13">
        <h1 id="text13" >Personality
            <a id="button13" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg></a>
        </h1>
    </div>
    <div>
        <div id="textAreaEdit1">
            <p id="textArea1"> Denji is both brash and naïve as a result of being unable to have a formal education and socialize due to  living in severe poverty. His personality comes off as rude and harsh in an almost childish way. However,  he has a good sense of empathy towards other people, willing to save those in danger as much as he could,  showing he is a kind-hearted person despite his shortcomings. While Denji doesn't necessarily possess the highest intelligence, he is capable of clever ideas to take down Devils, such as lighting himself on fire and using the light emitted to weaken Santa Claus enough to kill her.
                <a id="buttonArea1" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg></a>
            </p>
        </div>
        <div class="imageCapitol">
            <img id="imageShow2" class="rounded-2" src="/public/img/Wikipage/ChainsawMan1.jpeg">
            <form>
                <input id="formImage2"  type="file"  accept="image/*">
            </form>
        </div>
    </div>
    <div>
        <div class="imageCapitol">
            <img id="imageShow3" class="rounded-2" src="/public/img/Wikipage/ChainsawMan1.jpeg">
            <form>
                <input id="formImage3"  type="file"  accept="image/*">
            </form>
        </div>
        <div id="textAreaEdit2">
            <p id="textArea2"> Denji is both brash and naïve as a result of being unable to have a formal education and socialize due to  living in severe poverty. His personality comes off as rude and harsh in an almost childish way. However,  he has a good sense of empathy towards other people, willing to save those in danger as much as he could,  showing he is a kind-hearted person despite his shortcomings. While Denji doesn't necessarily possess the highest intelligence, he is capable of clever ideas to take down Devils, such as lighting himself on fire and using the light emitted to weaken Santa Claus enough to kill her.
                <a id="buttonArea2" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg></a>
            </p>
        </div>
    </div>
    <div class="buttonAddParagraph"><button>Add new paragrath</button></div>
</div>
<div class="Capitol" id="Capitol2">
    <div class="CapitolHeader" id="edit14">
        <h1 id="text14" >Relationships
            <a id="button14" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg></a>
        </h1>
    </div>
    <div>
        <div id="textAreaEdit3">
            <p id="textArea3">  Pochita was saved by Denji when in his time of need by feeding him his blood to recover from an injury, leading to them befriending one another Devil and Human alike. This allowed the debt that filled young Denji to be dealt with by becoming a young demon hunter with the help of Pochita. Later after being a Demon Hunter his whole life Denji was betrayed by the debt collector and brutally murdered by zombified humans. This death caused Pochita to become Denji's heart due to a contract making Denji a Devil-human Hybrid.
                <a id="buttonArea3" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg></a>
            </p>
        </div>
    </div>
    <div>
        <div class="imageCapitol">
            <img id="imageShow4" class="rounded-2" src="/public/img/Wikipage/ChainsawMan2.jpg">
            <form>
                <input id="formImage4"  type="file"  accept="image/*">
            </form>
        </div>
        <div id="textAreaEdit4">
            <p id="textArea4">  Pochita was saved by Denji when in his time of need by feeding him his blood to recover from an injury, leading to them befriending one another Devil and Human alike. This allowed the debt that filled young Denji to be dealt with by becoming a young demon hunter with the help of Pochita. Later after being a Demon Hunter his whole life Denji was betrayed by the debt collector and brutally murdered by zombified humans. This death caused Pochita to become Denji's heart due to a contract making Denji a Devil-human Hybrid.
                <a id="buttonArea4" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg></a>
            </p>
        </div>
    </div>
    <div class="buttonAddParagraph"><button>Add new paragrath</button></div>
</div>
<div class="Capitol" id="Capitol3">
    <div class="CapitolHeader" id="edit15">
        <h1 id="text15" >Abilities
            <a id="button15" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg></a>
        </h1>
    </div>
    <div>
        <div id="textAreaEdit5">
            <p id="textArea5"> Enhanced Human Condition: Due to fusing with Pochita, Denji gained superhuman abilities even when not transformed. In his human form, Denji is durable enough to survive being hit by Power with a hammer and getting squeezed by the Bat Devil, despite both individuals possessing immense strength.[8][9] He is also very strong, capable of decapitating a Fiend with just one swing of his Axe.
                <a id="buttonArea5" class="link-light link-opacity-75-hover"><svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg></a>
            </p>
        </div>
        <div class="imageCapitol">
            <img id="imageShow4" class="rounded-2">
            <form>
                <input id="formImage4"  type="file"  accept="image/*">
            </form>
        </div>
    </div>
    <div class="buttonAddParagraph"><button>Add new paragrath</button></div>
</div>
<div class="buttonAddCapitol"><button>Add new capitol</button></div>-->

<div class="Gallery">
    <h1>Gallery</h1>
    <!-- Gallery -->
    <div class="row">
        <div id="gallery1" class="col-lg-4 col-md-12 mb-4 mb-lg-0">

            <?php $picturesColumn = \App\Models\GalleryPictures::getAll("id_character = ? AND id_column = ?", [$data["character"]->getId(), '1']);
                foreach ($picturesColumn as $picture):  ?>

                    <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
            <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
                <form id="galleryColumn1" action='<?=$link->url('characters.addPictureToGallery', ['id' => $data["character"]->getId(), 'column' => '1']) ?>' method='post' enctype="multipart/form-data">
                    <input id="galleryAddButton1" type="file" name='gallery1'  accept="image/*">
                </form>
            <?php endif; ?>
        </div>

        <div id="gallery2" class="col-lg-4 mb-4 mb-lg-0">
            <?php $picturesColumn = \App\Models\GalleryPictures::getAll("id_character = ? AND id_column = ?", [$data["character"]->getId(), '2']);
            foreach ($picturesColumn as $picture):  ?>

                <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
            <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
                <form id="galleryColumn2" action='<?=$link->url('characters.addPictureToGallery', ['id' => $data["character"]->getId(), 'column' => '2']) ?>' method='post' enctype="multipart/form-data">
                    <input id="galleryAddButton2" type="file" name='gallery2'  accept="image/*">
                </form>
            <?php endif; ?>
        </div>

        <div id="gallery3" class="col-lg-4 mb-4 mb-lg-0">
            <?php $picturesColumn = \App\Models\GalleryPictures::getAll("id_character = ? AND id_column = ?", [$data["character"]->getId(), '3']);
            foreach ($picturesColumn as $picture):  ?>

            <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
            <?php if($auth->isLogged() && $data["character"]->getAuthor() == $auth->getLoggedUserName()): ?>
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
            <img src="/public/img/charactersPage/IronMan.png" alt="Character1">
            <p>Iron Man</p>
            <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="#">Read more -></a></p>
        </div>

        <div>
            <img src="/public/img/charactersPage/ChainsawMan.png" alt="Character2">
            <p>Chainsaw Man</p>
            <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="#">Read more -></a></p>
        </div>
        <div>
            <img src="/public/img/charactersPage/Junkrat.png" alt="Character3">
            <p>Junkrat</p>
            <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="#">Read more -></a></p>
        </div>
        <div>
            <img src="/public/img/charactersPage/Iroh.png" alt="Character4">
            <p>Uncle Iroh</p>
            <p><a class="link-opacity-75 link-opacity-75-hover link-success" href="#">Read more -></a></p>
        </div>

    </div>
</div>


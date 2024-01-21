<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/public/css/globalparams.css">
    <link rel="stylesheet" href="/public/css/main/footer.css">
    <link rel="stylesheet" href="/public/css/main/navbar/navbar.css">
    <link rel="stylesheet" href="/public/css/main/navbar/animation.scss">

    <link rel="stylesheet" href="/public/css/main/general.css">
    <link rel="stylesheet" href="/public/css/main/textforpages.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="icon" type="image/png" href="/public/img/logo.png">

</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img alt="Logo" src="/public/img/logo.png" class ="logo" >
        </a>
        <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white <?= (strpos($_SERVER['REQUEST_URI'],"home")) ? "selectedNavItem" : "" ?>" href="<?= $link->url("home.index") ?>">Home page
                        <img alt="Line" src="/public/img/line.png">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?=(strpos($_SERVER['REQUEST_URI'],"aboutUs")) ? "selectedNavItem" : "" ?>" href="<?= $link->url("aboutUs.index") ?>">About us
                        <img alt="Line" src="/public/img/line.png">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?=(strpos($_SERVER['REQUEST_URI'],"characters")) ? "selectedNavItem" : "" ?>" href="<?= $link->url("characters.index") ?>">Characters
                        <img alt="Line" src="/public/img/line.png">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white <?=(strpos($_SERVER['REQUEST_URI'],"login")) ? "selectedNavItem" : "" ?>
                                                    <?=(strpos($_SERVER['REQUEST_URI'],"account")) ? "selectedNavItem" : "" ?>"
                       href="<?= $auth->isLogged() ? $link->url("account.index") : $link->url("auth.index") ?>" >
                        <?= $auth->isLogged() ? "Account" : "Sign in " ?>
                        <img alt="Line" src="/public/img/line.png">
                    </a>
                </li>
                <?php if($auth->isLogged()): ?>
                <li class="nav-item">
                    <a class="nav-link text-white"
                       href="<?=$link->url("auth.logout")?>" >
                        Log out
                        <img alt="Line" src="/public/img/line.png">
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>
<div class="footer" id="Footer">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top">
        <div class="col-md-4 d-flex align-items-center">
            <span class="mb-3 mb-md-0 ">© 2023 45Games, Inc</span>
        </div>

        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex align-items-center">
            <li class="ms-3 mb-md-0">
                <a href="<?= $link->url("contact.index") ?>">Contact us</a>
            </li>
            <li class="ms-3">
                <a class="link-light link-opacity-75-hover" href="https://twitter.com/">
                    <i class="bi bi-twitter"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="link-light link-opacity-75-hover" href="https://www.instagram.com/">
                    <i class="bi bi-instagram"></i>
                </a>
            </li>
            <li class="ms-3">
                <a class="link-light link-opacity-75-hover" href="https://www.facebook.com/">
                    <i class="bi bi-facebook"></i>
                </a>
            </li>
        </ul>
    </footer>
</div>

</body>
</html>

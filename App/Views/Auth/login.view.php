<?php

/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>
<head>
    <link rel="stylesheet" href="/public/css/auth/login.css">
    <link rel="stylesheet" href="/public/css/auth/form.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <script type="module" src="/public/js/authorization/AuthCreate.js"></script>
</head>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto parentLoginPanel">
            <div class="card card-signin"  id="login">
                <div class="card-body rounded-1">
                    <h6 class="text-center">Hello there,</h6>
                    <h1 class="text-center">Welcome back</h1>
                    <div class="text-center text-danger mb-3" id="errorTextLogin" data-action="<?= $link->url("account.index") ?>">

                    </div>
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="loginLog" class="form-control" placeholder="Login"
                                   required autofocus>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="passwordLog" class="form-control"
                                   placeholder="Password" required>
                        </div>
                        <div class="text-center">
                            <button id="loginSubmit"  class="btn btn-success" type="submit" name="submit">Login
                            </button>
                        </div>
                        <div class="text-center mt-3">
                            <a class="link-opacity-75-hover" style="cursor: pointer"  id="buttonRegister">not registered yet?</a>
                        </div>
                </div>
            </div>

            <div class="card card-signin" id="registration" style="display: none">
                <div class="card-body rounded-1">
                    <h1 class="text-center">Registration</h1>
                    <div class="text-center text-danger mb-3" id="errorTextRegistration" data-action="<?= $link->url("account.index") ?>">
                    </div>
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="loginReg" class="form-control" placeholder="Login"
                                   required autofocus>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="email" type="email" id="emailReg" class="form-control"
                                   placeholder="Email" required>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="passwordReg" class="form-control"
                                   placeholder="Password" required>
                        </div>
                        <div class="text-center">
                            <button id="registrationSubmit" class="btn btn-success" name="submit">Registration
                            </button>
                        </div>

                        <div class="text-center mt-3">
                            <a class="link-opacity-75-hover" style="cursor: pointer" id="buttonLogin">back to login</a>
                        </div>
                </div>
            </div>

        </div>
    </div>
</div>

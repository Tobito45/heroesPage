<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Helpers\LoginStatus;
use App\Helpers\RegistrationStatus;
use App\Models\User;

/**
 * Class DummyAuthenticator
 * Basic implementation of user authentication
 * @package App\Auth
 */
class DummyAuthenticator implements IAuthenticator
{
    public const LOGIN = "admin";
    public const PASSWORD_HASH = '$2y$10$GRA8D27bvZZw8b85CAwRee9NH5nj4CQA6PDFMc90pN9Wi4VAWq3yq'; // admin
    public const USERNAME = "Account";

    /**
     * DummyAuthenticator constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    public function login($login, $password): LoginStatus
    {
        $user = User::getAll("name = ?", [$login]);
        if(empty($user)) {
            return LoginStatus::FAILED_USER;
        }
        if(!password_verify($password, $user[0]->getPassword())) { //$password != $user[0]->getPassword()) {
            return LoginStatus::FAILED_PASSWORD;
        }
        $_SESSION['user'] = $login;
        return LoginStatus::CORRECT;
        /*  if ($login == $password) {
             $_SESSION['user'] = $login;
             return true;
         } else {
             return false;
         }
        if ($login == self::LOGIN && password_verify($password, self::PASSWORD_HASH)) {
             $_SESSION['user'] = self::USERNAME;
             return true;
         } else {
             return false;
         }*/
    }


    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $email
     * @return RegistrationStatus
     */
    public function registration($login, $email) : RegistrationStatus
    {
        if ((User::getAll("name = ? AND email = ?", [$login, $email])) != null) {
            return RegistrationStatus::FAILED_LOGIN_EMAIL;
        }
        if (User::getAll("name = ?", [$login]) != null) {
            return RegistrationStatus::FAILED_LOGIN;
        }
        if (User::getAll("email = ?", [$email]) != null) {
            return RegistrationStatus::FAILED_EMAIL;
        }
        $_SESSION['user'] = $login;
        return RegistrationStatus::CORRECT;
    }

    /**
     * Logout the user
     */
    public function logout(): void
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    /**
     * Get the name of the logged-in user
     * @return string
     * @throws \Exception
     */
    public function getLoggedUserName(): string
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : throw new \Exception("User not logged in");
    }

    /**
     * Get the context of the logged-in user
     * @return string
     */
    public function getLoggedUserContext(): mixed
    {
        return null;
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    public function isLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    /**
     * Return the id of the logged-in user
     * @return mixed
     */
    public function getLoggedUserId(): mixed
    {
        return $_SESSION['user'];
    }
}

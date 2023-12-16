<?php

namespace App\Core;

use App\Helpers\LoginStatus;
use App\Helpers\RegistrationStatus;

/**
 * Interface IAuthenticator
 * Interface for authentication
 * @package App\Core
 */
interface IAuthenticator
{
    /**
     * Perform user login
     * @param $login
     * @param $password
     * @return bool
     */
    public function login($login, $password): LoginStatus;

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $email
     * @return RegistrationStatus
     * @throws \Exception
     */
    public function registration($login, $email): RegistrationStatus;

    /**
     * Perform user login
     * @return void
     */
    public function logout(): void;

    /**
     * Return name of a logged user
     * @return string
     */
    public function getLoggedUserName(): string;

    /**
     * Return id of a logged user
     * @return mixed
     */
    public function getLoggedUserId(): mixed;

    /**
     * Return a context of logged user, e.g. user class instance
     * @return mixed
     */
    public function getLoggedUserContext(): mixed;

    /**
     * Return, if a user is logged or not
     * @return bool
     */
    public function isLogged(): bool;
}

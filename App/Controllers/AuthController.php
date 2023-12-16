<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\EmptyResponse;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Helpers\LoginStatus;
use App\Helpers\RegistrationStatus;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        return $this->html();
    }
    public function signIn() {
        $jsonData = $this->app->getRequest()->getRawBodyJSON();

        if (
            is_object($jsonData)
            && property_exists($jsonData, 'login')
            && property_exists($jsonData, 'password')
            && !empty($jsonData->login) && !empty($jsonData->password)) {

            $logged = $this->app->getAuth()->login($jsonData->login, $jsonData->password);

            return $this->json($logged->value);
        } else {
            throw new HTTPException(400, 'The user regestration failed, please, reload the page and try again');

        }
    }

    public function registration(): Response
    {
        $jsonData = $this->app->getRequest()->getRawBodyJSON();

        if (
            is_object($jsonData)
            && property_exists($jsonData, 'login') &&  property_exists($jsonData, 'email')
            &&  property_exists($jsonData, 'password')
            && !empty($jsonData->login) && !empty($jsonData->email) && !empty($jsonData->password))
        {
            $registr = $this->app->getAuth()->registration($jsonData->login,$jsonData->email);
            if ($registr == RegistrationStatus::CORRECT) {
                $newUser = new User();
                $newUser->setName($jsonData->login);
                $newUser->setEmail($jsonData->email);
                $newUser->setRole("user");

                $options = ['cost' => 12];
                $hashedPassword = password_hash($jsonData->password, PASSWORD_BCRYPT, $options);
                $newUser->setPassword($hashedPassword);

                $newUser->save();

            }
            return $this->json($registr->value);
        } else {
            throw new HTTPException(400, 'The user regestration failed, please, reload the page and try again');
        }

    }

    /**
     * Logout a user
     * @return ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->html();
    }
}

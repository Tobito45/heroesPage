<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Character;

/**
 * Class HomeController
 * Example class of a controller
 * @package App\Controllers
 */
class AccountController extends AControllerBase
{
    /**
     * Authorize controller actions
     * @param $action
     * @return bool
     */
    public function authorize($action)
    {
        return $this->app->getAuth()->isLogged();
    }

    /**
     * Example of an action (authorization needed)
     * @return \App\Core\Responses\Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html();
    }

    public function createNewHero() : Response
    {
        $jsonData = $this->app->getRequest()->getRawBodyJSON();

        if(is_object($jsonData)
            && property_exists($jsonData, 'name') &&  property_exists($jsonData, 'image')
            && !empty($jsonData->name) && !empty($jsonData->image)) {

            if(Character::getAll("name = ?", [$jsonData->name]) != null) {
                return $this->json(-1);
            }
            $character = new Character();
            $character->setName($jsonData->name);
            $character->setPicture($jsonData->image);
            $character->setAuthor($this->app->getAuth()->getLoggedUserName());
            $character->setQuote("...");
            $character->save();

            return $this->json($character->getId());
        } else {
            throw new HTTPException(400, 'The user regestration failed, please, reload the page and try again');
        }
    }
}

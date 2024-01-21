<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\EmptyResponse;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Character;
use App\Models\GalleryPictures;
use App\Models\Review;
use App\Models\User;

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
            throw new HTTPException(400, 'Error creating hero');
        }
    }

    public function deleteHero() : Response
    {
        $jsonData = $this->app->getRequest()->getRawBodyJSON();
        if(is_object($jsonData)
            && property_exists($jsonData, 'id') && !empty($jsonData->id)) {

            $character = Character::getOne($jsonData->id);
            $userRole = User::getAll("name = ?", [$this->app->getAuth()->getLoggedUserName()])[0]->getRole();
            if($character->getAuthor() != $this->app->getAuth()->getLoggedUserName() &&
                $userRole != "admin") {
                throw new HTTPException(400, 'Error delete character');
            }


            $pictures = GalleryPictures::getAll('id_character = ?', [$character->getId()]);
            foreach ($pictures as $picture) {
                if ($picture != null) {
                    FileStorage::deleteFile($picture->getPicture());
                    $picture->delete();
                }
            }
            $reviews = Review::getAll('id_character = ?', [$character->getId()]);
            foreach ($reviews as $review) {
                if ($review != null) {
                    $review->delete();
                }
            }


            $character->delete();
            return new EmptyResponse();
        } else {
            return $this->json(false);
        }
    }
}

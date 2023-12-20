<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\EmptyResponse;
use App\Core\Responses\Response;
use App\Models\Character;
use App\Models\Review;

class ReviewController extends AControllerBase
{

    public function index(): Response
    {
        // TODO: Implement index() method.
    }

    public function editReview() : Response
    {
        $jsonData = $this->app->getRequest()->getRawBodyJSON();
        if(is_object($jsonData)

            &&  property_exists($jsonData, 'id_character')
            &&  property_exists($jsonData, 'text') &&  property_exists($jsonData, 'grade')
            && !empty($jsonData->id_character)
            && !empty($jsonData->text) && !empty($jsonData->grade)) {

            $review = null;
            if(Review::getAll("id_character = ? AND author = ?", [$jsonData->id_character, $this->app->getAuth()->getLoggedUserName()])) {
                $review = Review::getAll("id_character = ? AND author = ?", [$jsonData->id_character, $this->app->getAuth()->getLoggedUserName()])[0];
            } else {
                $review = new Review();
                $review->setAuthor($this->app->getAuth()->getLoggedUserName());
                $review->setIdCharacter($jsonData->id_character);
            }
            $review->setGrade($jsonData->grade);
            $review->setText($jsonData->text);
            $review->save();


            return new EmptyResponse();
        } else {
            throw new HTTPException(400, 'The user regestration failed, please, reload the page and try again');
        }
    }


    public function deleteReview() : Response
    {
        $jsonData = $this->app->getRequest()->getRawBodyJSON();
        if(is_object($jsonData)

            &&  property_exists($jsonData, 'id_character')
            &&  property_exists($jsonData, 'name')
            && !empty($jsonData->id_character) && !empty($jsonData->name)
                && $this->app->getAuth()->getLoggedUserName() == "admin") {

            $review = Review::getAll("id_character = ? AND author = ?", [$jsonData->id_character, $jsonData->name])[0];
            $review->delete();

            return new EmptyResponse();
        } else {
            throw new HTTPException(400, 'The user regestration failed, please, reload the page and try again');
        }
    }
}
<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\HTTPException;
use App\Core\Responses\Response;
use App\Core\Responses\EmptyResponse;
use App\Models\Character;
use App\Helpers\FileStorage;
use App\Models\GalleryPictures;
use App\Core\Responses\JsonResponse;

class CharactersController extends AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        return $this->html();
    }

    public function characterPage() : Response
    {
        $id = $this->request()->getValue("character");
        return $this->html(["character" => Character::getOne($id)]);
    }

    public function characterAll() : Response
    {
        return $this->html();
    }

    public function saveCharacterName() : Response
    {
        $jsonData = $this->app->getRequest()->getRawBodyJSON();
        if (
            is_object($jsonData)
            && property_exists($jsonData, 'id') &&  property_exists($jsonData, 'newName')
            &&  property_exists($jsonData, 'valueParam')
            && (!empty($jsonData->newName) || !Character::isValueParamCanBeNull($jsonData->newName)))
        {

            $id = (int)$jsonData->id;
            $valueParam = $jsonData->valueParam;
            $character = Character::getOne($id);
            $character->setStringValueFromName($valueParam, $jsonData->newName);
            $character->save();
            return new EmptyResponse();

        } else {
            throw new HTTPException(400, 'Bad name file');
        }
    }

    public function saveCharacterImage() : Response
    {
        $fileData = $this->request()->getFiles()['file'];
        $id = (int)$this->request()->getValue('id');
        $character = Character::getOne($id);

        if($character != null && $fileData != null) {
            if ($character->getPicture() !== "" && !empty($character->getPicture())) {
                FileStorage::deleteFile($character->getPicture());
            }
            $newFileName = FileStorage::saveFile($fileData);

            $character->setPicture($newFileName);
            $character->save();

            return new EmptyResponse();
        } else {
            throw new HTTPException(400, 'Bad request structure');
        }

    }

    public function addPictureToGallery() {
        $fileData = $this->request()->getFiles()['file'];
        $idGetValue = $this->request()->getValue('id_character');
        $columnGetValue = $this->request()->getValue('id_column');
        if(!empty($fileData)
            && !empty($idGetValue) && is_numeric($idGetValue)
            && !empty($columnGetValue) && is_numeric($columnGetValue) ) {

            $id = (int)$idGetValue;
            $column = (int)$columnGetValue;

            $picture = FileStorage::saveFile($fileData);

            $galleryPicture = new GalleryPictures();
            $galleryPicture->setPicture($picture);
            $galleryPicture->setIdCharacter($id);
            $galleryPicture->setIdColumn($column);

            $galleryPicture->save();

            return new EmptyResponse();
        } else {
            throw new HTTPException(400, 'Bad file data');
        }

    }

    public function deletePictureGallery() {
        $id_image = (int)$this->request()->getValue('id_image');

        $picture = GalleryPictures::getOne($id_image);

        if ($picture != null) {
            FileStorage::deleteFile($picture->getPicture());
            $picture->delete();
        }
        return new EmptyResponse();

    }

    public function getLastPictureGalleryId() : Response {
        $jsonData = $this->app->getRequest()->getRawBodyJSON();

        if(is_object($jsonData)
            && property_exists($jsonData, 'id_character') &&  property_exists($jsonData, 'id_column')
            && !empty($jsonData->id_character) && !empty($jsonData->id_column)) {

            $id_character = $jsonData->id_character;
            $id_column = $jsonData->id_column;

            $picture = GalleryPictures::getAll("id_character = ? AND id_column = ?", [$id_character, $id_column], "id");
            $lastValue = end($picture);
            return $this->json($lastValue);
        } else {
            throw new HTTPException(400, 'Bad picture structure');
        }
    }
}
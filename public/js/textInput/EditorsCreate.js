import {TextEditAPI} from "./TextEditAPI.js";
import {TextAreaEditAPI} from "./TextAreaEditAPI.js";
import {InputImageObjAPI} from "../imageInput/InputImageObjAPI.js";
import {GalleryEditorAPI} from "../imageInput/GalleryEditorAPI.js";


class EditorsCreate {
    static #countTextEdit = 12;//15;
    static #countImageEdit = 1//4;
    constructor() {
        for(let i = 1; i <= EditorsCreate.#countTextEdit; i++) {
            if(i === 2)
                continue;
            new TextEditAPI(i)
        }

        new TextAreaEditAPI(1);

        for(let i = 1; i <= EditorsCreate.#countImageEdit; i++) {
           new InputImageObjAPI(i)
        }
        new GalleryEditorAPI()

        for (let i = 0; i < document.getElementsByClassName("buttonAddParagraph").length; i++) {
            new ParagraphAdd(document.getElementsByClassName("buttonAddParagraph")[i], (i+1));
        }
    }

}

export {EditorsCreate};
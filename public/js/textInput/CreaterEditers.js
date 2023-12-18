import {TextEditObj} from "./TextEditObj.js";
import {TextAreaEditObj} from "./TextAreaEditObj.js";
import {InputImageObj} from "../imageInput/InputImageObj.js";
import {GalleryEditor} from "../imageInput/GalleryEditor.js";
import {ParagraphAdd} from "../paragraphAndCapitol/ParagraphAdd.js";


class CreaterEditers {
    static #countTextEdit = 12;//15;
    static #countTextAreaEdit = 5;
    static #countImageEdit = 1//4;
    constructor() {

        for(let i = 1; i <= CreaterEditers.#countTextEdit; i++) {
            new TextEditObj(i)
        }

     //   for(let i = 1; i <= CreaterEditers.#countTextAreaEdit; i++) {
      //      new TextAreaEditObj(i)
       // }

        for(let i = 1; i <= CreaterEditers.#countImageEdit; i++) {
           new InputImageObj(i)
        }
        new GalleryEditor()

        for (let i = 0; i < document.getElementsByClassName("buttonAddParagraph").length; i++) {
            new ParagraphAdd(document.getElementsByClassName("buttonAddParagraph")[i], (i+1));
        }
    }

}

export {CreaterEditers};
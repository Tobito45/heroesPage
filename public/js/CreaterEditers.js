import {TextEditObj} from "./TextEditObj.js";
import {TextAreaEditObj} from "./TextAreaEditObj.js";
import {InputImageObj} from "./InputImageObj.js";
import {GalleryEditor} from "./GalleryEditor.js";

class CreaterEditers {
    static #countTextEdit = 15;
    static #countTextAreaEdit = 5;
    static #countImageEdit = 4;
    constructor() {
        for(let i = 1; i <= CreaterEditers.#countTextEdit; i++) {
            new TextEditObj(i)
        }

        for(let i = 1; i <= CreaterEditers.#countTextAreaEdit; i++) {
            new TextAreaEditObj(i)
        }

        for(let i = 1; i <= CreaterEditers.#countImageEdit; i++) {
            new InputImageObj(i)
        }
        new GalleryEditor()
    }

}

export {CreaterEditers};
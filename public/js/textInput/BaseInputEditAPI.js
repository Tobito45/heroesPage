import {DataService} from "../DataService.js";

class BaseInputEditAPI {
    #saveElementText = null;
    #saveDivElement = null;
    _elementText = null;
    _elementButtonEdit = null;
    _elementDiv = null;
    _index = -1;

    constructor(index) {
        this._index = index;
        this.reset()
    }

     reset() {
        this.#saveElementText = this._getElementText().innerText;
        this._elementText = this._getElementText();
        this._elementButtonEdit = this._getElementButtonEdit();
        this._elementDiv = this._getElementDiv();
        this._elementButtonEdit.addEventListener("click", () => {
            this.openInputField();
        });
    }

    _getElementText() {}

    _getElementButtonEdit() {}

    _getElementDiv() {}

     openInputField() {
        this.saveDiv();
        this._elementDiv.innerHTML = this.getInputHTML();
        this.openInputFieldWithText();
         this.initializeInputEvents();
    }

    getInputHTML() {}

     initializeInputEvents() {
        this._elementDiv.getElementsByClassName("confirm")[0].addEventListener("click", () => {
            if (this._elementDiv.getAttribute("data-is-not-null") === "true"
                && this._elementDiv.getElementsByClassName("text")[0].value === "") {
                const errorElement = this._elementDiv.querySelector(".error");
                errorElement.style.color = "red";
                errorElement.style.display = "inline"

                errorElement.style.display = "inline"
                return;
            }

            this.saveInputField(this._elementDiv.getElementsByClassName("text")[0].value).then();
        });

        this._elementDiv.getElementsByClassName("cancel")[0].addEventListener("click", () => {
            this.closeInputField();
        });
    }

    openInputFieldWithText() {}

    async saveInputField(newText) {
        this.closeInputField();
        if (newText !== this._elementText.childNodes[0].nodeValue) {
            const res = await DataService.sendRequest(
                'saveCharacterName',
                "POST",
                204,
                {
                    'id': characterId,
                    'newName': newText,
                    'valueParam': this._elementDiv.getAttribute("data-value")
                },
                false,
                'characters'
            )
        }

        this._elementText.childNodes[0].nodeValue = newText;
    }



    closeInputField() {
        this._elementDiv.innerHTML = this.#saveDivElement;
        this.reset();
    }

    saveDiv() {
        this.#saveDivElement = this._elementDiv.innerHTML;
    }
}



export {BaseInputEditAPI};

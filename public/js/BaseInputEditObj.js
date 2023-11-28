class BaseInputEditObj {
    #saveElementText = null;
    #saveDivElement = null;
    _elementText = null;
    _elementButtonEdit = null;
    _elementDiv = null;
    _index = -1;

    constructor(index) {
        this._index = index;
        this.reset();
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
            this.saveInputField(this._elementDiv.getElementsByClassName("text")[0].value);
        });

        this._elementDiv.getElementsByClassName("cancel")[0].addEventListener("click", () => {
            this.closeInputField();
        });
    }

    openInputFieldWithText() {}

    saveInputField(newText) {
        this.closeInputField();
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



export {BaseInputEditObj};

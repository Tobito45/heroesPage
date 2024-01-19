import {BaseInputEditAPI} from "./BaseInputEditAPI.js";
class TextAreaEditAPI extends BaseInputEditAPI {
    getInputHTML() {
        return "<textarea class=\"text\" id=\"textarea\"   >\n" +
            "             </textarea>\n" +
            "          <a class=\"link-light link-opacity-75-hover\">\n" +
            "             <i class=\"bi bi-check-square confirm\"></i></a>\n" +
            "          <a class=\"link-light link-opacity-75-hover\">\n" +
            "             <i class=\"bi bi-x-square cancel\"></i></a>\n" +
            "          <i class=\"error bi bi-exclamation-square\"></i> "
    }


    _getElementText() {
        return document.getElementById("textArea" + this._index);
    }

    _getElementButtonEdit() {
        return document.getElementById("buttonArea" + this._index);
    }

    _getElementDiv() {
        return document.getElementById("textAreaEdit" + this._index);
    }

    openInputFieldWithText() {
        this._elementDiv.getElementsByClassName("text")[0].innerText = this._elementText.innerText.trim();
    }

}
export {TextAreaEditAPI};
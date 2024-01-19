import {BaseInputEditAPI} from "./BaseInputEditAPI.js";
import {DataService} from "../DataService.js";
class TextEditAPI extends BaseInputEditAPI {
    getInputHTML() {
        return "<label>\n" +
            "        <input name='text' class=\"text\" type=\"text\" maxlength=\"150\" autocomplete=\"off\">\n" +
            "       <a class=\"link-light link-opacity-75-hover\">\n" +
            "           <i class=\"bi bi-check-square confirm\"></i></a>\n" +
            "        <a class=\"link-light link-opacity-75-hover\">\n" +
            "               <i class=\"bi bi-x-square cancel\"></i></a>\n" +
            "        <i class=\"error bi bi-exclamation-square\"></i> " +
            "    </label>";
    }



    _getElementText() {
        return document.getElementById("text" + this._index);
    }

    _getElementButtonEdit() {
        return document.getElementById("button" + this._index);
    }

    _getElementDiv() {
        return document.getElementById("edit" + this._index);
    }

    openInputFieldWithText() {
        this._elementDiv.getElementsByClassName("text")[0].value = this._elementText.innerText.trim();

    }
}
export {TextEditAPI};
import {BaseInputEditObj} from "./BaseInputEditObj.js";
import {DataService} from "../DataService.js";
class TextEditObj extends BaseInputEditObj {
    getInputHTML() {
        return "<label>\n" +
            "        <input name='text' class=\"text\" type=\"text\" maxlength=\"150\" autocomplete=\"off\">\n" +
            "       <a class=\"link-light link-opacity-75-hover\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"confirm bi bi-check-square\" viewBox=\"0 0 16 16\">\n" +
            "                <path d=\"M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z\"/>\n" +
            "                <path d=\"M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z\"/>\n" +
            "            </svg></a>\n" +
            "        <a class=\"link-light link-opacity-75-hover\"><svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"cancel bi bi-x-square\" viewBox=\"0 0 16 16\">\n" +
            "            <path d=\"M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z\"/>\n" +
            "            <path d=\"M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708\"/>\n" +
            "        </svg></a>\n" +
            "       <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"error bi bi-exclamation-square \" style='display:none' viewBox=\"0 0 16 16\">\n" +
            "           <path d=\"M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z\"/>\n" +
            "           <path d=\"M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z\"/>\n" +
            "        </svg>\n" +
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
export {TextEditObj};
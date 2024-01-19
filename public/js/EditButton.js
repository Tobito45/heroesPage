import {EditorsCreate} from "./textInput/EditorsCreate.js";
import {ReviewAPI} from "./review/ReviewAPI.js";

window.onload = () => {
    new EditorsCreate();
    new ReviewAPI();

}
import {DataService} from "../DataService.js";

class ReviewAPI {
    #inputGrade = null
    #button = null
    #confirmReview = null
    #divReview = null;
    constructor() {
        this.#inputGrade = document.getElementById("inputGrade");
        if(this.#inputGrade != null) {
            this.#inputGrade.addEventListener("input", () => {
                if (this.#inputGrade.value > 5) {
                    this.#inputGrade.value = 5;
                }
                if (this.#inputGrade.value < 1) {
                    this.#inputGrade.value = 1;
                }
                //console.log(this.#inputGrade.value)
            });
        }
        this.#button = document.getElementById("buttonSubmitReview")
        this.#confirmReview = document.getElementById("confirmReview")
        if(this.#button != null) {
            this.#button.addEventListener("click", () => {
                this.editOrCreateReview(document.getElementById("areaReview").value, this.#inputGrade.value).then()
            })
        }


        let buttonsDeleteReview = document.getElementsByClassName("parentDiv");
        for(let i = 0; i < buttonsDeleteReview.length; i++) {
            if(buttonsDeleteReview[i].getElementsByClassName("deleteReview").length !== 0) {
                buttonsDeleteReview[i].getElementsByClassName("deleteReview")[0].addEventListener("click", () => {
                    this.removeReview(buttonsDeleteReview[i].getElementsByClassName("nameAuthor")[0].innerText,
                        characterId, buttonsDeleteReview[i]).then()
                })
            }
        }

        this.#divReview = document.getElementById("mainReview");

        if(this.#divReview != null) {
            this.#divReview.getElementsByClassName("deleteReview")[0].addEventListener("click", () => {
                this.removeReview( this.#divReview.getElementsByClassName("nameAuthor")[0].innerText,
                    characterId, null).then()
            })
        }

    }

    async editOrCreateReview(text, grade) {
        const result = await DataService.sendRequest(
            'editReview',
            "POST",
            204,
            {
                'id_character': characterId,
                'text': text,
                'grade': grade
            },
            false,
            'review'
        )

        if(result === true) {
            this.#confirmReview.style.display = "block";
            setTimeout(() => this.#confirmReview.style.display = "none", 3000);
        }
    }

    async removeReview(name, id_character, block) {
        const result = await DataService.sendRequest(
            'deleteReview',
            "POST",
            204,
            {
                'id_character': characterId,
                'name': name,
            },
            false,
            'review'
        )
        if(result === true) {
            if(block !== null) {
                block.remove();
            } else {
                console.log(document.getElementById("areaReview").value);

                document.getElementById("areaReview").value = "";
                document.getElementById("inputGrade").value = "1";
            }
        }
    }
}

export {ReviewAPI};
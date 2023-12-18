import {DataService} from "../DataService.js";

class NameSelect {
    #panel = null;
    constructor() {
        this.#panel = document.getElementById("askPanel");

        document.getElementById("nameClose").addEventListener("click", () => {
            this.#panel.style.display = "none";
        })
        document.getElementById("nameSubmit").addEventListener("click", () => {
            let name = document.getElementById("nameInput").value;
            if(name !== null) {
                const imgUrl = document.getElementsByClassName("didntExistImage")[0].src;
                const url = new URL(imgUrl);
                const pathRelativeToBase = url.pathname;

                this.createHeroPage(name, pathRelativeToBase).then();
            }
        })

        let doesntExist = document.getElementsByClassName("didntExist");
        for (let i = 0; i < doesntExist.length; i++) {
            doesntExist[i].addEventListener("click", () => {
                this.#panel.style.display = "block";
            })
        }

        let buttonsTrash = document.getElementsByClassName("delete")
        for (let i = 0; i < buttonsTrash.length; i++) {
            buttonsTrash[i].addEventListener("click", () => {
                this.deleteHeroPage(buttonsTrash[i].getAttribute("data-delete"))
            })
        }

        this.#panel.style.display = "none";

    }

    async createHeroPage(name, image) {
        const res = await DataService.sendRequest(
            'createNewHero',
            "POST",
            200,
            {
                'name': name,
                'image': image
            },
            -1,
            'account'
        )
        console.log(res);
        if(res === -1) {
            console.log("this person already exists");
        } else {
            window.location.href = document.getElementById("addCharacter").getAttribute("data-action") + "&character=" + res;
        }
    }

    async deleteHeroPage(id) {
        await DataService.sendRequest(
            'deleteHero',
            "POST",
            200,
            {
                'id':id
            },
            false,
            'account'
        )
        //window.location.href = document.getElementById("changeCharacter").getAttribute("data-action");
    }
}


export {NameSelect};
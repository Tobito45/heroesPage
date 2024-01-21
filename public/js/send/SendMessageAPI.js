import {EmailDetecter} from "../EmailDetecter.js";

class SendMessageAPI {
    #messagePanel = null;
    constructor() {
        document.getElementById("submitButton").addEventListener("click", () => this.sendMail())
        this.#messagePanel = document.getElementById("errorMessage");
    }

     sendMail() {
        let params = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            message: document.getElementById("message").value,
        };

        const serviceID = "service_jlgh7wf";
        const templateID = "template_rev4qze";

        if(params.email === "" || params.name === "" || params.message === "") {
            this.#messagePanel.innerText = "Fill all fields!"
            this.#messagePanel.style.display = "block";
            setTimeout(() => this.#messagePanel.style.display = "none", 3000);
            return;
        }

         if(!EmailDetecter.isEmailValid(params.email)) {
             this.#messagePanel.innerText = "Fill the correct email!"
             this.#messagePanel.style.display = "block";
             setTimeout(() => this.#messagePanel.style.display = "none", 3000);
             return;
         }

        console.log(serviceID + " " + templateID);
        emailjs.send(serviceID, templateID, params)
            .then(res=>{
                document.getElementById("name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("message").value = "";
                console.log(res);
                alert("Your message sent successfully!!")

            })
            .catch(err=>console.log(err));

    }
}

export {SendMessageAPI};
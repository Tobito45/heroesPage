import {DataService} from "../DataService.js";

class AuthorizationAPI {
    #panelLogin = null
    #panelRegistration = null
    constructor() {
        this.#panelLogin = document.getElementById("login")
        this.#panelRegistration = document.getElementById("registration")

        document.getElementById("buttonLogin").addEventListener("click", () => {
            this.showLoginPanel();
        })

        document.getElementById("buttonRegister").addEventListener("click", () => {
            this.showRegistrationPanel();
        })

            document.getElementById("registrationSubmit").addEventListener("click", async () => {
                await this.regestration(document.getElementById("loginReg").value, document.getElementById("emailReg").value,
                    document.getElementById("passwordReg").value).then()
            })
        this.showLoginPanel();

    }

    showLoginPanel() {
        this.#panelRegistration.style.display = "none";
        this.#panelLogin.style.display = "flex";
    }

    showRegistrationPanel() {

        this.#panelLogin.style.display = "none";
        this.#panelRegistration.style.display = "flex";

    }

    async regestration(login, email, password) {
        const result = await DataService.sendRequest(
            'registration',
            "POST",
            200,
            {
                'login': login,
                'email': email,
                'password': password
            },
            [],
            'auth'
        )

        console.log(result)
    }
}

export {AuthorizationAPI};
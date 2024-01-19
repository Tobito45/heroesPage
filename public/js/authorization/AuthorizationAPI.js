import {DataService} from "../DataService.js";

class AuthorizationAPI {
    static #EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;

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

        document.getElementById("loginSubmit").addEventListener("click", async () => {
            await this.login(document.getElementById("loginLog").value, document.getElementById("passwordLog").value).then()
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
        if (login.trim() === "" || password.trim() === "" || email.trim() === "") {
            document.getElementById("errorTextRegistration").innerText = "Fill all fields!"
            return;
        }

        console.log(email + " " + AuthorizationAPI.isEmailValid(email));
        if(!AuthorizationAPI.isEmailValid(email)) {
            document.getElementById("errorTextRegistration").innerText = "Error email field"
            return;
        }

        const result = await DataService.sendRequest(
            'registration',
            "POST",
            200,
            {
                'login': login,
                'email': email,
                'password': password
            },
            ["watafac"],
            'auth'
        )
        console.log(result);
        if(result === "CORRECT") {
            window.location.href = document.getElementById("errorTextRegistration").getAttribute("data-action");
        } else {
            document.getElementById("errorTextRegistration").innerText = result;
        }
    }

    async login(login, password) {
        if (login.trim() === "" || password.trim() === "") {
            document.getElementById("errorTextLogin").innerText = "Fill all fields!"
            return;
        }


        const result = await DataService.sendRequest(
            'signIn',
            "POST",
            200,
            {
                'login': login,
                'password': password
            },
            ["watafac"],
            'auth'
        )
        console.log(result);
        if(result === "CORRECT") {
            window.location.href = document.getElementById("errorTextLogin").getAttribute("data-action");
        } else {
            document.getElementById("errorTextLogin").innerText = result;
        }
    }

    static isEmailValid(value) {
        return AuthorizationAPI.#EMAIL_REGEXP.test(value);
    }
}

export {AuthorizationAPI};
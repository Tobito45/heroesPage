class EmailDetecter {
    static #EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;

    static isEmailValid(value) {
        return EmailDetecter.#EMAIL_REGEXP.test(value);
    }
}

export {EmailDetecter};
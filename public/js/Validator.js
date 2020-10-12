export default class Validator {
    validateName(inputValue) {
        return /^\w{2,128}$/g.test(inputValue.trim());
    }

    validatePassword(inputValue) {
        this.password = inputValue;
        return /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^\w\s]).{6,}/.test(inputValue.trim());
    }

    validateLogin(inputValue) {
        return /^\w{6,128}$/g.test(inputValue.trim());
    }

    validateEmail(inputValue) {
        return /^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u.test(inputValue.trim());
    }

    validateConfirmPassword(inputValue) {
        return this.password === inputValue
    }
}
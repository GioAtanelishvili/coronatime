import ValidationError from "./ValidationError";

const EMAIL_REGEX =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

class Validate {
    static errors = new Map();

    static name = (input) => {
        const value = input.trim();
        const validation = new ValidationError("name", "სახელი");

        if (value === "") {
            this.errors.set("name", validation.required);
        } else if (value.length < 3) {
            this.errors.set("name", validation.length);
        } else {
            this.errors.delete("name");
        }
    };

    static email = (input) => {
        const value = input.trim();
        const validation = new ValidationError("email", "ელ-ფოსტა");

        if (value === "") {
            this.errors.set("email", validation.required);
        } else if (!value.toLowerCase().match(EMAIL_REGEX)) {
            this.errors.set("email", validation.email);
        } else {
            this.errors.delete("email");
        }
    };

    static password = (input) => {
        const value = input.trim();
        const validation = new ValidationError("password", "პაროლი");

        if (value === "") {
            this.errors.set("password", validation.required);
        } else if (value.length < 3) {
            this.errors.set("password", validation.length);
        } else {
            this.errors.delete("password");
        }
    };

    static passwordConfirmation = (input, password) => {
        const value = input.trim();
        const validation = new ValidationError(
            "password confirmation",
            "გამეორებული პაროლი"
        );

        if (value === "") {
            this.errors.set("password_confirmation", validation.required);
        } else if (value !== password.trim()) {
            this.errors.set("password_confirmation", validation.match);
        } else {
            this.errors.delete("password_confirmation");
        }
    };
}

export default Validate;

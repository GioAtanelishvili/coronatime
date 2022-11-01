const EMAIL_REGEX =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

class Validate {
    static errors = new Map();

    static name = (input) => {
        const value = input.trim();

        if (value === "") {
            this.errors.set("name", "The username field is required.");
        } else if (value.length < 3) {
            this.errors.set(
                "name",
                "The username must be at least 3 characters."
            );
        } else {
            this.errors.delete("name");
        }
    };

    static email = (input) => {
        const value = input.trim();

        if (value === "") {
            this.errors.set("email", "The email field is required.");
        } else if (!value.toLowerCase().match(EMAIL_REGEX)) {
            this.errors.set(
                "email",
                "The email must be a valid email address."
            );
        } else {
            this.errors.delete("email");
        }
    };

    static password = (input) => {
        const value = input.trim();

        if (value === "") {
            this.errors.set("password", "The password field is required.");
        } else if (value.length < 3) {
            this.errors.set(
                "password",
                "The password must be at least 3 characters."
            );
        } else {
            this.errors.delete("password");
        }
    };

    static passwordConfirmation = (input, password) => {
        const value = input.trim();

        if (value === "") {
            this.errors.set(
                "password_confirmation",
                "The repeat password field is required."
            );
        } else if (value !== password.trim()) {
            this.errors.set(
                "password_confirmation",
                "The repeat password and password must match."
            );
        } else {
            this.errors.delete("password_confirmation");
        }
    };
}

export default Validate;

const EMAIL_REGEX =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

class Validate {
    static errors = new Map();

    static username = (input) => {
        const value = input.trim();

        if (value === "") {
            this.errors.set("username", "Username is required!");
        } else if (value.length < 3) {
            this.errors.set(
                "username",
                "Username should be at least 3 chars long!"
            );
        } else {
            this.errors.delete("username");
        }
    };

    static email = (input) => {
        const value = input.trim();

        if (value === "") {
            this.errors.set("email", "Email is required!");
        } else if (!value.toLowerCase().match(EMAIL_REGEX)) {
            this.errors.set("email", "Email should be valid!");
        } else {
            this.errors.delete("email");
        }
    };

    static password = (input) => {
        const value = input.trim();

        if (value === "") {
            this.errors.set("password", "Password is required!");
        } else if (value.length < 3) {
            this.errors.set(
                "password",
                "Password should be at least 3 chars long!"
            );
        } else {
            this.errors.delete("password");
        }
    };

    static repeatPassword = (input, password) => {
        const value = input.trim();

        if (value === "") {
            this.errors.set("repeatPassword", "Repeat password is required!");
        } else if (value !== password.trim()) {
            this.errors.set(
                "repeatPassword",
                "Repeat password should match password!"
            );
        } else {
            this.errors.delete("repeatPassword");
        }
    };
}

export default Validate;

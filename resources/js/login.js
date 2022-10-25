import { Input, Validate } from "./helpers";

const form = document.getElementById("form");

const username = new Input("username", "username");
const password = new Input("password", "password");

username.addChangeListener();
password.addChangeListener();

const handleSubmit = (e) => {
    username.isSubmitted = true;
    password.isSubmitted = true;

    Validate.username(username.input.value);
    Validate.password(password.input.value);

    if (Validate.errors.size > 0) {
        e.preventDefault();

        if (Validate.errors.get("username")) {
            username.showError();
        }

        if (Validate.errors.get("password")) {
            password.showError();
        }
    }
};

form.addEventListener("submit", handleSubmit);

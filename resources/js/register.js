import { Input, RepeatPasswordInput, PasswordInput, Validate } from "./helpers";

const form = document.getElementById("form");

const name = new Input("name", "name");
const email = new Input("email", "email");
const repeatPassword = new RepeatPasswordInput(
    "repeat-password",
    "repeatPassword"
);
const password = new PasswordInput("password", "password", repeatPassword);

name.addChangeListener();
email.addChangeListener();
password.addChangeListener();
repeatPassword.addChangeListener();

const handleSubmit = (e) => {
    name.isSubmitted = true;
    email.isSubmitted = true;
    password.isSubmitted = true;
    repeatPassword.isSubmitted = true;

    Validate.name(name.input.value);
    Validate.email(email.input.value);
    Validate.password(password.input.value);
    Validate.repeatPassword(repeatPassword.input.value, password.input.value);

    if (Validate.errors.size > 0) {
        e.preventDefault();

        if (Validate.errors.get("name")) {
            name.showError();
        }

        if (Validate.errors.get("email")) {
            email.showError();
        }

        if (Validate.errors.get("password")) {
            password.showError();
        }

        if (Validate.errors.get("repeatPassword")) {
            repeatPassword.showError();
        }
    }
};

form.addEventListener("submit", handleSubmit);

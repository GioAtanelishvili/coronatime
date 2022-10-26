import { Input, RepeatPasswordInput, PasswordInput, Validate } from "./helpers";

const form = document.getElementById("form");

const username = new Input("username", "username");
const email = new Input("email", "email");
const repeatPassword = new RepeatPasswordInput(
    "repeat-password",
    "repeatPassword"
);
const password = new PasswordInput("password", "password", repeatPassword);

username.addChangeListener();
email.addChangeListener();
password.addChangeListener();
repeatPassword.addChangeListener();

const handleSubmit = (e) => {
    username.isSubmitted = true;
    email.isSubmitted = true;
    password.isSubmitted = true;
    repeatPassword.isSubmitted = true;

    Validate.username(username.input.value);
    Validate.email(email.input.value);
    Validate.password(password.input.value);
    Validate.repeatPassword(repeatPassword.input.value, password.input.value);

    if (Validate.errors.size > 0) {
        e.preventDefault();

        if (Validate.errors.get("username")) {
            username.showError();
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

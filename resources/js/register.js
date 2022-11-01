import {
    PasswordConfirmationInput,
    PasswordInput,
    Validate,
    Input,
} from "./helpers";

const form = document.getElementById("form");

const name = new Input("name", "name");
const email = new Input("email", "email");
const passwordConfirmation = new PasswordConfirmationInput(
    "password-confirmation",
    "password_confirmation"
);
const password = new PasswordInput(
    "password",
    "password",
    passwordConfirmation
);

name.addChangeListener();
email.addChangeListener();
password.addChangeListener();
passwordConfirmation.addChangeListener();

const handleSubmit = (e) => {
    name.isSubmitted = true;
    email.isSubmitted = true;
    password.isSubmitted = true;
    passwordConfirmation.isSubmitted = true;

    Validate.name(name.input.value);
    Validate.email(email.input.value);
    Validate.password(password.input.value);
    Validate.passwordConfirmation(
        passwordConfirmation.input.value,
        password.input.value
    );

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

        if (Validate.errors.get("password_confirmation")) {
            passwordConfirmation.showError();
        }
    }
};

form.addEventListener("submit", handleSubmit);

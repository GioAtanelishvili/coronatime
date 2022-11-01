import { PasswordConfirmationInput, PasswordInput, Validate } from "./helpers";

const form = document.getElementById("form");

const passwordConfirmation = new PasswordConfirmationInput(
    "password-confirmation",
    "password_confirmation"
);
const password = new PasswordInput(
    "password",
    "password",
    passwordConfirmation
);

password.addChangeListener();
passwordConfirmation.addChangeListener();

const handleSubmit = (e) => {
    password.isSubmitted = true;
    passwordConfirmation.isSubmitted = true;

    Validate.password(password.input.value);
    Validate.passwordConfirmation(
        passwordConfirmation.input.value,
        password.input.value
    );

    if (Validate.errors.size > 0) {
        e.preventDefault();

        if (Validate.errors.get("password")) {
            password.showError();
        }

        if (Validate.errors.get("password_confirmation")) {
            passwordConfirmation.showError();
        }
    }
};

form.addEventListener("submit", handleSubmit);

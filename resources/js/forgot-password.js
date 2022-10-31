import { Input, Validate } from "./helpers";

const form = document.getElementById("form");

const email = new Input("email", "email");

email.addChangeListener();

const handleSubmit = (e) => {
    email.isSubmitted = true;

    Validate.email(email.input.value);

    if (Validate.errors.size > 0) {
        e.preventDefault();

        if (Validate.errors.get("email")) {
            email.showError();
        }
    }
};

form.addEventListener("submit", handleSubmit);

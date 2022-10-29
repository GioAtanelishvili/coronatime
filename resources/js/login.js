import { Input, Validate } from "./helpers";

const form = document.getElementById("form");

const name = new Input("name", "name");
const password = new Input("password", "password");

name.addChangeListener();
password.addChangeListener();

const handleSubmit = (e) => {
    name.isSubmitted = true;
    password.isSubmitted = true;

    Validate.name(name.input.value);
    Validate.password(password.input.value);

    if (Validate.errors.size > 0) {
        e.preventDefault();

        if (Validate.errors.get("name")) {
            name.showError();
        }

        if (Validate.errors.get("password")) {
            password.showError();
        }
    }
};

form.addEventListener("submit", handleSubmit);

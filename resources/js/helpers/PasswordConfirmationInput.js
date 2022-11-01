import Validate from "./Validate";
import Input from "./Input";

class PasswordConfirmationInput extends Input {
    constructor(id, name) {
        super(id, name);

        this.passwordElement = document.getElementById("password");
    }

    validateOnPasswordChange = (e) => {
        Validate.passwordConfirmation(this.input.value, e.target.value);

        this._handleErrors();
    };

    _validateOnChange = (e) => {
        this.isTouched = true;

        Validate.passwordConfirmation(
            e.target.value,
            this.passwordElement.value
        );

        if (this._hasError() && !this.isErrorShown) {
            this._hideSuccess();
            this.showError();
        } else if (
            this._hasError() &&
            Validate.errors.get(this.name) !==
                this.errorElement.lastChild.textContent
        ) {
            this._hideSuccess();
            this._hideError();
            this.showError();
        } else if (this._hasSucceded()) {
            this._hideError();
            this._showSuccess();
        }
    };

    addChangeListener = () => {
        this.input.addEventListener("input", this._validateOnChange);
    };
}

export default PasswordConfirmationInput;

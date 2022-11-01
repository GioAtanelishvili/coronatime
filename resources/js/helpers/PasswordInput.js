import Validate from "./Validate";
import Input from "./Input";

class PasswordInput extends Input {
    constructor(id, name, passwordConfirmation) {
        super(id, name);

        this.passwordConfirmation = passwordConfirmation;
    }

    _validateOnChange = (e) => {
        this.isTouched = true;

        Validate.password(e.target.value);
        this.passwordConfirmation.validateOnPasswordChange(e);

        this._handleErrors();
    };
}

export default PasswordInput;

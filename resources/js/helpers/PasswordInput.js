import Validate from "./Validate";
import Input from "./Input";

class PasswordInput extends Input {
    constructor(id, name, repeatPassword) {
        super(id, name);

        this.repeatPassword = repeatPassword;
    }

    _validateOnChange = (e) => {
        this.isTouched = true;

        Validate.password(e.target.value);
        this.repeatPassword.validateOnPasswordChange(e);

        this._handleErrors();
    };
}

export default PasswordInput;

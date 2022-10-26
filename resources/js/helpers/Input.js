import Validate from "./Validate";

class Input {
    isSubmitted = false;

    isTouched = false;

    isErrorShown = false;

    isSuccessShown = false;

    successSvg = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9.003 14L16.073 6.929L14.659 5.515L9.003 11.172L6.174 8.343L4.76 9.757L9.003 14Z" fill="#249E2C"/>
                  </svg>`;

    errorSvg = `<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 20C4.477 20 0 15.523 0 10C0 4.477 4.477 0 10 0C15.523 0 20 4.477 20 10C20 15.523 15.523 20 10 20ZM9 13V15H11V13H9ZM9 5V11H11V5H9Z" fill="#CC1E1E"/>
                </svg>`;

    constructor(id, name) {
        this.id = id;
        this.name = name;
        this.input = document.getElementById(id);
        this.parent = this.input.parentElement;
    }

    _hasError = () => {
        return Boolean(Validate.errors.get(this.name));
    };

    _hasSucceded = () => {
        return this.isTouched && !this._hasError();
    };

    _createErrorElement = (message) => {
        this.errorElement = document.createElement("div");

        this.errorElement.style.display = "flex";
        this.errorElement.style.marginLeft = "2px";
        this.errorElement.style.position = "absolute";
        this.errorElement.style.alignItems = "center";
        this.errorElement.style.gap = "0.75rem";
        this.errorElement.style.bottom = "-1.5rem";

        this.errorElement.insertAdjacentHTML("afterbegin", this.errorSvg);

        const paragraph = document.createElement("p");

        paragraph.textContent = message;
        paragraph.style.color = "#B91C1C";
        paragraph.style.fontSize = "0.75rem";
        paragraph.style.fontWeight = "500";

        this.errorElement.appendChild(paragraph);
    };

    showError = () => {
        if (this.isSubmitted && this._hasError() && !this.isErrorShown) {
            const error = Validate.errors.get(this.name);

            this._createErrorElement(error);

            this.parent.appendChild(this.errorElement);
            this.input.style.borderColor = "#B91C1C";

            this.isErrorShown = true;
        }
    };

    _hideError = () => {
        if (this.isErrorShown) {
            this.parent.removeChild(this.errorElement);
            this.input.style.borderColor = "#E5E5E5";

            this.isErrorShown = false;
        }
    };

    _showSuccess = () => {
        if (!this.isSuccessShown) {
            this.successElement = document.createElement("div");

            this.successElement.style.position = "absolute";
            this.successElement.style.right = "1.25rem";
            this.successElement.style.bottom = "1.25rem";

            this.successElement.insertAdjacentHTML(
                "afterbegin",
                this.successSvg
            );

            this.parent.appendChild(this.successElement);
            this.input.style.borderColor = "#249E2C";

            this.isSuccessShown = true;
        }
    };

    _hideSuccess = () => {
        if (this.isSuccessShown) {
            this.parent.removeChild(this.successElement);
            this.input.style.borderColor = "#E5E5E5";

            this.isSuccessShown = false;
        }
    };

    _handleErrors = () => {
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

    _validateOnChange = (e) => {
        this.isTouched = true;

        Validate[this.name](e.target.value);

        this._handleErrors();
    };

    addChangeListener = () => {
        this.input.addEventListener("input", this._validateOnChange);
    };
}

export default Input;

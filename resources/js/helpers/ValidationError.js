class ValidationError {
    language = document.getElementById("select").dataset.language;

    constructor(en, ka) {
        if (this.language === "en") {
            this.required = `The ${en} field is required.`;
            this.length = `The ${en} must be at least 3 characters.`;
            this.email = "The email must be a valid email address.";
            this.match = "The password confirmation and password must match.";
        } else if (this.language === "ka") {
            const possesive = this._toPossessive(ka);

            this.required = `${possesive} ველი სავალდებულოა.`;
            this.length = `${possesive} ველი უნდა შედგებოდეს მინიმუმ სამი სიმბოლოსგან.`;
            this.email = "ელ-ფოსტა უნდა იყოს ვალიდური ელ-ფოსტის მისამართი.";
            this.match = "გამეორებული პაროლი და პაროლი უნდა ემთხვეოდეს.";
        }
    }

    _toPossessive = (field) => {
        if (field.endsWith("ა")) {
            return field.slice(0, -1) + "ის";
        } else {
            return field + "ს";
        }
    };
}

export default ValidationError;

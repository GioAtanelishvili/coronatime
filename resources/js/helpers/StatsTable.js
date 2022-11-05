class StatsTable {
    tbody = document.getElementById("tbody");

    rows = Array.from(this.tbody.children);

    arrowsAsc = Array.from(document.getElementsByClassName("arrow-asc"));
    arrowsDesc = Array.from(document.getElementsByClassName("arrow-desc"));

    locationBtn = document.getElementById("location-btn");
    locationArrowAsc = document.getElementById("location-arrow-asc");
    locationArrowDesc = document.getElementById("location-arrow-desc");
    locationOrder = "asc";

    confirmedBtn = document.getElementById("confirmed-btn");
    confirmedArrowAsc = document.getElementById("confirmed-arrow-asc");
    confirmedArrowDesc = document.getElementById("confirmed-arrow-desc");
    confirmedOrder;

    deathsBtn = document.getElementById("deaths-btn");
    deathsArrowAsc = document.getElementById("deaths-arrow-asc");
    deathsArrowDesc = document.getElementById("deaths-arrow-desc");
    deathsOrder;

    recoveredBtn = document.getElementById("recovered-btn");
    recoveredArrowAsc = document.getElementById("recovered-arrow-asc");
    recoveredArrowDesc = document.getElementById("recovered-arrow-desc");
    recoveredOrder;

    constructor() {
        this.locationBtn.addEventListener("click", this.sortByLocation);
        this.confirmedBtn.addEventListener("click", this.sortByConfirmed);
        this.deathsBtn.addEventListener("click", this.sortByDeaths);
        this.recoveredBtn.addEventListener("click", this.sortByRecovered);
    }

    sortByLocation = () => {
        if (!this.locationOrder) {
            this.locationOrder = "desc";
        }

        if (this.locationOrder === "asc") {
            this._markArrowsAsInactive();
            this.locationArrowDesc.style.borderBottomColor = "#000000";

            const callback = this._generateStringSortCallback(
                "location",
                "desc"
            );
            this.rows.sort(callback);

            this.locationOrder = "desc";
        } else if (this.locationOrder === "desc") {
            this._markArrowsAsInactive();
            this.locationArrowAsc.style.borderTopColor = "#000000";

            const callback = this._generateStringSortCallback(
                "location",
                "asc"
            );
            this.rows.sort(callback);

            this.locationOrder = "asc";
        }

        this.rows.forEach((row) => this.tbody.appendChild(row));
    };

    sortByConfirmed = () => {
        if (!this.confirmedOrder) {
            this.confirmedOrder = "desc";
        }

        if (this.confirmedOrder === "asc") {
            this._markArrowsAsInactive();
            this.confirmedArrowDesc.style.borderBottomColor = "#000000";

            const callback = this._generateNumberSortCallback(
                "confirmed",
                "desc"
            );
            this.rows.sort(callback);

            this.confirmedOrder = "desc";
        } else if (this.confirmedOrder === "desc") {
            this._markArrowsAsInactive();
            this.confirmedArrowAsc.style.borderTopColor = "#000000";

            const callback = this._generateNumberSortCallback(
                "confirmed",
                "asc"
            );
            this.rows.sort(callback);

            this.confirmedOrder = "asc";
        }

        this.rows.forEach((row) => this.tbody.appendChild(row));
    };

    sortByDeaths = () => {
        if (!this.deathsOrder) {
            this.deathsOrder = "desc";
        }

        if (this.deathsOrder === "asc") {
            this._markArrowsAsInactive();
            this.deathsArrowDesc.style.borderBottomColor = "#000000";

            const callback = this._generateNumberSortCallback("deaths", "desc");
            this.rows.sort(callback);

            this.deathsOrder = "desc";
        } else if (this.deathsOrder === "desc") {
            this._markArrowsAsInactive();
            this.deathsArrowAsc.style.borderTopColor = "#000000";

            const callback = this._generateNumberSortCallback("deaths", "asc");
            this.rows.sort(callback);

            this.deathsOrder = "asc";
        }

        this.rows.forEach((row) => this.tbody.appendChild(row));
    };

    sortByRecovered = () => {
        if (!this.recoveredOrder) {
            this.recoveredOrder = "desc";
        }

        if (this.recoveredOrder === "asc") {
            this._markArrowsAsInactive();
            this.recoveredArrowDesc.style.borderBottomColor = "#000000";

            const callback = this._generateNumberSortCallback(
                "recovered",
                "desc"
            );
            this.rows.sort(callback);

            this.recoveredOrder = "desc";
        } else if (this.recoveredOrder === "desc") {
            this._markArrowsAsInactive();
            this.recoveredArrowAsc.style.borderTopColor = "#000000";

            const callback = this._generateNumberSortCallback(
                "recovered",
                "asc"
            );
            this.rows.sort(callback);

            this.recoveredOrder = "asc";
        }

        this.rows.forEach((row) => this.tbody.appendChild(row));
    };

    _getCell = (row, subject) => {
        switch (subject) {
            case "location":
                return row.children[0];
            case "confirmed":
                return row.children[1];
            case "deaths":
                return row.children[2];
            case "recovered":
                return row.children[3];
        }
    };

    _markArrowsAsInactive = () => {
        this.locationOrder = null;
        this.confirmedOrder = null;
        this.deathsOrder = null;
        this.recoveredOrder = null;

        this.arrowsAsc.forEach((el) => (el.style.borderTopColor = "#a8a29e"));
        this.arrowsDesc.forEach(
            (el) => (el.style.borderBottomColor = "#a8a29e")
        );
    };

    _generateStringSortCallback = (column, order) => {
        if (order === "asc") {
            return (a, b) => {
                const cellA = this._getCell(a, column);
                const cellB = this._getCell(b, column);

                return cellA.textContent > cellB.textContent ? 1 : -1;
            };
        } else if (order === "desc") {
            return (a, b) => {
                const cellA = this._getCell(a, column);
                const cellB = this._getCell(b, column);

                return cellA.textContent > cellB.textContent ? -1 : 1;
            };
        }
    };

    _generateNumberSortCallback = (column, order) => {
        if (order === "asc") {
            return (a, b) => {
                const cellA = this._getCell(a, column);
                const cellB = this._getCell(b, column);

                const valueA = this._toNumber(cellA.textContent);
                const valueB = this._toNumber(cellB.textContent);

                return valueA - valueB;
            };
        } else if (order === "desc") {
            return (a, b) => {
                const cellA = this._getCell(a, column);
                const cellB = this._getCell(b, column);

                const valueA = this._toNumber(cellA.textContent);
                const valueB = this._toNumber(cellB.textContent);

                return valueB - valueA;
            };
        }
    };

    _toNumber = (string) => {
        return parseInt(string.replace(",", ""));
    };
}

export default StatsTable;

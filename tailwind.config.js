/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            spacing: {
                4.5: "1.125rem",
            },
            fontFamily: {
                inter: ["Inter", "sans-serif"],
            },
            boxShadow: {
                input: "-3px 3px 0px #DBE8FB, -3px -3px 0px #DBE8FB, 3px -3px 0px #DBE8FB, 3px 3px 0px #DBE8FB",
            },
            gridTemplateColumns: {
                table: "minmax(0, 1fr) minmax(0, 1fr) minmax(0, 1fr) minmax(0, 1fr) 0.5rem",
            },
        },
    },
    plugins: [],
};

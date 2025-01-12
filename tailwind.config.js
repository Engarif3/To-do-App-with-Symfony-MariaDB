/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js", // Adjust the paths as needed
    "./templates/**/*.html.twig",
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("daisyui"), // Add DaisyUI plugin here
  ],
};

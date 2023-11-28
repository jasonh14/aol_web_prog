/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  daisyui: {
    themes: [
      {
        mytheme: {
          "primary": "#22D3EE",

          "secondary": "#009aee",

          "accent": "#00b5ff",

          "neutral": "#1d170e",

          "base-100": "#2d2a2f",

          "info": "#00caea",

          "success": "#73a600",

          "warning": "#bb6d00",

          "error": "#ff939c",
        },
      },
    ],
  },
  plugins: [require("daisyui")],
}


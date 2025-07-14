module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.php"
  ],
  safelist: [
    {
    pattern: /^h-(\d+|auto|full|screen)$/,
  },
  {
    pattern: /^py-(\d+|px|auto)$/,
  },
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

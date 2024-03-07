const mix = require('laravel-mix');
mix.js("public/assets/js/app.js", "public/assets/tailwind/js")
  .postCss("public/css/app.css", "public/assets/tailwind/css", [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
    require('postcss-nested'),
  ]);

  mix.webpackConfig({
    stats: {
        children: true,
    },
});

const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        plugin(function({ addVariant, e }) {
            addVariant('blurred', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.blurred .${e(`blurred${separator}${className}`)}`
                })
            })
        }),
        plugin(function({ addVariant, e }) {
            addVariant('focused', ({ modifySelectors, separator }) => {
                modifySelectors(({ className }) => {
                    return `.focused .${e(`blurred${separator}${className}`)}`
                })
            })
        })
],
};

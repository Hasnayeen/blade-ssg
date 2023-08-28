import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

module.exports = {
    darkMode: 'class',
    content: [
        './resources/views/**/*.blade.php',
    ],
    plugins: [forms, typography],
}

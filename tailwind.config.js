/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    darkMode: "class",
    theme: {
        extend: {
            backgroundImage: {
                'adminlogin': "linear-gradient(to right bottom, rgba(43, 51, 125, 0.9), rgba(43, 51, 125, 0.9)), url('http://127.0.0.1:8000/companyImage.png')",
            },
            fontFamily: {
                nunito: ['Nunito', "sans-serif"],
            },
            colors: {
                'blue': {
                  500: '#2B337D',
                },
                'orange': {
                    '500': '#DD5B1D',
                }
            },
        },
        screens: {
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
        },
    },
    plugins: [

    ]
}

import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'nepal-red': {
                    DEFAULT: '#B71C1C',
                    50: '#FDE8E8',
                    100: '#FBC5C5',
                    200: '#F89D9D',
                    300: '#F57575',
                    400: '#F25252',
                    500: '#EF2F2F',
                    600: '#D62929',
                    700: '#B71C1C',
                    800: '#981616',
                    900: '#7A1111',
                },
                'nepal-gray': {
                    DEFAULT: '#E0E0E0',
                    50: '#F8F8F8',
                    100: '#F0F0F0',
                    200: '#E0E0E0',
                    300: '#CFCFCF',
                    400: '#BDBDBD',
                    500: '#9E9E9E',
                    600: '#757575',
                    700: '#616161',
                    800: '#424242',
                    900: '#212121',
                },
            },
        },
    },
    plugins: [forms],
};

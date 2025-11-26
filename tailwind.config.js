import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import colors from 'tailwindcss/colors'; 

/** @type {import('tailwindcss').Config} */
export default {
    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js")
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
        './vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                // 1. TU TRUCO PARA LIVEWIRE TABLES
                // Esto hace que lo que la tabla pinta como "índigo" se vea gris.
                indigo: colors.gray, 

                // 2. CONFIGURACIÓN DE COLORES WIREUI
                // Aquí decides de qué color son los botones, inputs y alertas de WireUI.
                
                primary: colors.black,   
                secondary: colors.gray,   
                positive: colors.emerald, 
                negative: colors.red,     
                warning: colors.amber,    
                info: colors.blue         
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
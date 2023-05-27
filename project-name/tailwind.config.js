import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';


module.exports = {
    purge: [],
    darkMode: 'class', // Enable dark mode support
    theme: {
      extend: {},
    },
    variants: {},
    plugins: [],
  }
  
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};

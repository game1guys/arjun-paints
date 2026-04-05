import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    safelist: [
        'bg-hero-dark',
        'bg-mesh-spectrum',
        'bg-pay-gradient',
        'bg-soft-blue',
        'text-gradient-spectrum',
    ],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['DM Sans', ...defaultTheme.fontFamily.sans],
                display: ['"Plus Jakarta Sans"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                brand: {
                    50: '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60a5fa',
                    500: '#3b82f6',
                    600: '#2563eb',
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',
                    950: '#172554',
                },
                accent: {
                    300: '#fcd34d',
                    400: '#fbbf24',
                    500: '#f59e0b',
                    600: '#d97706',
                },
                ink: {
                    50: '#fafafa',
                    100: '#f4f4f5',
                    900: '#18181b',
                },
            },
            backgroundImage: {
                'hero-blue':
                    'linear-gradient(135deg, #1e3a8a 0%, #2563eb 38%, #7c3aed 72%, #db2777 100%)',
                'soft-blue': 'linear-gradient(180deg, #f0f9ff 0%, #ffffff 50%, #fafafa 100%)',
                'hero-dark':
                    'linear-gradient(165deg, #0c1222 0%, #1e1b4b 35%, #312e81 55%, #0c1222 100%)',
                'mesh-spectrum':
                    'radial-gradient(ellipse 80% 60% at 70% 20%, rgba(34,211,238,0.25), transparent 50%), radial-gradient(ellipse 60% 50% at 20% 80%, rgba(168,85,247,0.2), transparent 45%), radial-gradient(ellipse 50% 40% at 90% 90%, rgba(249,115,22,0.15), transparent 40%)',
                'card-shimmer':
                    'linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 50%, rgba(255,255,255,0.08) 100%)',
                'pay-gradient': 'linear-gradient(135deg, #2563eb 0%, #7c3aed 50%, #db2777 100%)',
            },
            borderRadius: {
                '4xl': '2rem',
            },
            boxShadow: {
                glow: '0 0 60px -12px rgba(37, 99, 235, 0.45)',
                'glow-cyan': '0 0 40px -8px rgba(34, 211, 238, 0.4)',
            },
        },
    },

    plugins: [forms],
};

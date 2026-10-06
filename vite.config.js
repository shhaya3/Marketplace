import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 1. Core Global Assets
                'resources/css/app.css', 
                'resources/css/tailwind.css',
                'resources/js/app.js', 
                'resources/js/mobile-menu.js',
                
                // 2. Restaurant
                'resources/css/pages/templates/restaurant.css',
                'resources/js/templates/restaurant.js',
                
                // 3. Hospital
                'resources/css/pages/templates/hospital.css',
                'resources/js/templates/hospital.js',
                
                // 4. Hotel
                'resources/css/pages/templates/hotel.css',
                'resources/js/templates/hotel.js',

                // 5. School
                'resources/css/pages/templates/school.css',
                'resources/js/templates/school.js',

                // 6. Real Estate
                'resources/css/pages/templates/real-estate.css',
                'resources/js/templates/real-estate.js',

                // 7. CA (Chartered Accountant)
                'resources/css/pages/templates/ca.css',
                'resources/js/templates/ca.js',

                // 8. Lawyer
                'resources/css/pages/templates/lawyer.css',
                'resources/js/templates/lawyer.js',

                // 9. Manufacturer
                'resources/css/pages/templates/manufacturer.css',
                'resources/js/templates/manufacturer.js',

                // 10. E-Commerce
                'resources/css/pages/templates/ecommerce.css',
                'resources/js/templates/ecommerce.js',

                // 11. Temple
                'resources/css/pages/templates/temple.css',
                'resources/js/templates/temple.js',

                // 12. Coaching
                'resources/css/pages/templates/coaching.css',
                'resources/js/templates/coaching.js',

                'resources/js/scroll-reveal.js',
            ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
    ],
    server: {
        host: '0.0.0.0',
        cors: true,
        hmr: {
            host: '192.168.1.72',
        },
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
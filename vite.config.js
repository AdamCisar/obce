import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    server: {
      host: 'ui42.local',
      port: 5173,
      strictPort: true,
      https: false,
      cors: true,
  },
  plugins: [
    laravel({
      input: [
        'resources/sass/app.scss', 
        'resources/js/app.js',
        'resources/js/cities/autocomplete.js',
        'resources/sass/pages/home.scss',
      ],
      refresh: true,
    }),
  ],
  css: {
    preprocessorOptions: {
      scss: {
        additionalData: `@import "@/sass/variables";`,
      },
    },
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources'),
    },
  },
});

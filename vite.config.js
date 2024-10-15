import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    manifest: true,
    rollupOptions: {
      input: {
        main: 'resources/css/app.css',
      },
    },
    outDir: 'public/build',
  },
});

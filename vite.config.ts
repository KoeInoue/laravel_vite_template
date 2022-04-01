import path from 'path'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import laravel from 'vite-plugin-laravel'

export default defineConfig({
  server: {
    host: '0.0.0.0'
  },
  build: {
    manifest: true,
    outDir: path.resolve(__dirname, 'public/dist'),
    rollupOptions: {
      input: 'resources/script/main.ts',
    },
  },
  plugins: [
    vue(),
    laravel()
  ]
});
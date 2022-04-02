import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import laravel from 'vite-plugin-laravel'

export default defineConfig({
  server: {
    host: '0.0.0.0',
  },
  plugins: [laravel(), vue()],
})

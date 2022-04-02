import { createApp } from 'vue'
import App from '@/scripts/App.vue'
import '@/css/tailwind.css'
import { http } from '@/scripts/plugins/axios'
import router from '@/scripts/router'
import { key, store } from '@/scripts/store/store'

const app = createApp(App)

app.use(http)
app.use(router)
app.use(store, key)

app.mount('#app')

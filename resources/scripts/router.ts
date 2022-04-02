import { Router, createRouter, createWebHashHistory } from 'vue-router'
import Home from './pages/HomePage.vue'
import About from './pages/AboutPage.vue'

const routes = [
  { path: '/', name: 'home', component: Home },
  { path: '/about', name: 'about', component: About },
]

const router: Router = createRouter({
  history: createWebHashHistory(),
  routes,
})

export default router

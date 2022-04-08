import { Router, createRouter, createWebHashHistory } from 'vue-router'
import Home from './pages/HomePage.vue'
import About from './pages/AboutPage.vue'

const routes = [
  { path: '/', name: 'home', component: Home },
  { path: '/about', name: 'about', component: About },
  {
    path: '/article',
    component: () => import('./pages/ArticlePage.vue'),
    redirect: '/article/list',
    children: [
      {
        path: 'list',
        name: 'article.index',
        component: () => import('./pages/article/List.vue'),
      },
      {
        path: ':id/update',
        name: 'article.update',
        component: () => import('./pages/article/Update.vue'),
        props: true,
      },
      {
        path: 'create',
        name: 'article.create',
        component: () => import('./pages/article/Create.vue'),
      },
      {
        path: ':id/detail',
        name: 'article.detail',
        component: () => import('./pages/article/Detail.vue'),
        props: true,
      },
    ],
  },
]

const router: Router = createRouter({
  history: createWebHashHistory(),
  routes,
})

export default router

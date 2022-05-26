import { createRouter, createWebHistory } from 'vue-router'
import homeView from '../views/users/homeView.vue'
import navBar from '../components/navbar/navbar.vue'

const routes = [
  
  {
    path: '/',
    redirect: '/home',
    component: navBar,
    meta: { requiresAuth: true },
    children: [

      { path: '/home', name: 'homeView', component: homeView },
     
    ]
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

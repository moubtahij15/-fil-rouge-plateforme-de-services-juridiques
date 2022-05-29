import { createRouter, createWebHistory } from 'vue-router'
import homeView from '../views/users/homeView.vue'
import navBar from '../components/navbar/navbar.vue'
import signUp from '../views/users/signUp.vue'
import signIn from '../views/users/signIn.vue'


const routes = [

  {
    path: '/',
    redirect: '/home',
    component: navBar,
    children: [

      { path: '/home', name: 'homeView', component: homeView },
      { path: '/signUp', name: 'signUp', component: signUp },
      { path: '/signIn', name: 'signIn', component: signIn },

    ]
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

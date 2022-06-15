import { createRouter, createWebHistory } from 'vue-router'
import homeView from '../views/users/homeView.vue'
import navBar from '../components/navbar/navbar.vue'
import signUp from '../views/users/signUp.vue'
import signIn from '../views/users/signIn.vue'
import avocats from '../views/users/avocats.vue'
import avocatProfile from '../views/users/avocatProfile.vue'
import profileUser from '../views/users/profileUser.vue'
import decouvrire from '../views/users/decouvrire.vue'


const routes = [

  {
    path: '/',
    redirect: '/home',
    component: navBar,
    children: [

      { path: '/home', name: 'homeView', component: homeView },
      { path: '/signUp', name: 'signUp', component: signUp },
      { path: '/signIn', name: 'signIn', component: signIn },
      { path: '/avocats', name: 'avocats', component: avocats },
      { path: '/avocatProfile', name: 'avocatProfile', component: avocatProfile },
      { path: '/profileUser', name: 'profileUser', component: profileUser },
      { path: '/decouvrire', name: 'decouvrire', component: decouvrire },

    ]
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router

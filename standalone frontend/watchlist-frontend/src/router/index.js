import { createRouter, createWebHistory } from 'vue-router'
import RegisterView from '../views/RegisterView.vue'
import RecoverView from '../views/RecoverView.vue'
import HomeView from "@/views/HomeView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/register',
      name: 'register',
      props: { default: true, recover: false, parameterName: 'reference'},
      component: RegisterView
    },
    {
      path: '/recover',
      name: 'recover',
      props: { default: true, recover: true, parameterName: 'identifier' },
      component: RegisterView
    }
  ]
})

export default router

import Vue from 'vue'
import VueRouter from 'vue-router'
import Calendar from '../components/Calendar/CalendarList.vue'
import Login from '../components/Login.vue'
import Terms from "@/components/Terms";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Login',
    component: Login
  },
  {
    path: '/calendar/',
    name: 'Calendar',
    component: Calendar
  },
  {
    path: '/terms/',
    name: 'Terms',
    component: Terms
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

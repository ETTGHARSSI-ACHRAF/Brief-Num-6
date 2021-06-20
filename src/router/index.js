import Vue from 'vue'
import VueRouter from 'vue-router'
import acceuil from '../views/acceuil.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'acceuil',
    component: acceuil
  },
  {
    path: '/inscription',
    name: 'inscription',
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/inscription.vue')
  },
  {
    path: '/liste/:reference',
    name: 'listerendezvous',
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/listerendezvous.vue')
  },
  {
    path: '/login',
    name: 'login',
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/login.vue')
  },
  {
    path: '/addrendezvous/:reference',
    name: 'addrendezvous',
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/addrendezvous.vue')
  },
  {
    path: '/updateredervous/:id',
    name: 'updateredervous',
    // component: inscri
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/updateredervous.vue')
  },
  
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router

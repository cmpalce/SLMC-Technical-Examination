import Vue from 'vue'
import Router from 'vue-router'
import Users from './views/Users.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Users
    },
    {
      path: '/users',
      name: 'users',
      component: Users
    }
  ]
})

import vueRouter from 'vue-router'
import home from './components/home.vue'


const routes = [{
    name: '',
    path: '/',
    component:home
}]

const router = new vueRouter({
    routes
})

export default router

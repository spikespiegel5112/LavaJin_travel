import Vue from 'vue'
import vueResource from 'vue-resource'
import vueRouter from 'vue-router'
import vuex from 'vuex'
import router from './router-config'
import home from './components/home.vue'

Vue.use(vueResource);
Vue.use(vueRouter);
Vue.config.debug = 'true';

new Vue({
    el: '#app',
    router,
    render: h => h(home)
})

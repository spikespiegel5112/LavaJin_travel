import Vue from 'vue'
import vueResource from 'vue-resource'
import vueRouter from 'vue-router'
import vuex from 'vuex'
import router from './router-config'
import index from './components/index.vue'

Vue.use(vueResource);
Vue.use(vueRouter);
Vue.config.debug = 'true';

new Vue({
    el: '#app',
    router,
    render: h => h(index)
})

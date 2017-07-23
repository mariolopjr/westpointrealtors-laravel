
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import NProgress from 'vue-nprogress';
import Buefy from 'buefy';
import 'buefy/lib/buefy.css'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
    'nprogress',
    require('./components/NProgress.vue'
));

Vue.use(Buefy, {
    defaultIconPack: 'fa'
});

Vue.component(
    'advanced-search-form',
    require('./components/AdvancedSearchForm.vue'
));

Vue.use(NProgress);

const nprogress = new NProgress({ parent: '.nprogress-container'  });

const app = new Vue({
    el: '#app',
    nprogress,

    mounted() {
        this.$nprogress.done();
    },

    created() {
        this.$nprogress.start();
        //
    }
});

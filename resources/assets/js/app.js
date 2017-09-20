
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';
import 'buefy/lib/buefy.css';
import VueImg from 'v-img';
import Dropzone from 'vue2-dropzone';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(Buefy, {
    defaultIconPack: 'fa'
});

Vue.component(
  'advanced-search-form',
  require('./components/AdvancedSearchForm.vue'
));

Vue.component(
  'google-map',
  require('./components/GoogleMap.vue'
));

Vue.use(VueImg, { altAsTitle: true });

const app = new Vue({
    el: '#app',

    mounted() {
        //
    },

    created() {
        //
    }
});


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

Vue.use(VueImg, { altAsTitle: true });

const app = new Vue({
    el: '#app',

    data() {
      return {
        displayArchived: false,
        dropFiles: [],
        tableSortDirection: "desc",
        tablePerPage: 10
      }
    },

    mounted() {
    },

    created() {
        //
    },

    methods: {
      deleteDropFile(index) {
        this.dropFiles.splice(index, 1)
      },

      toDate(date) {
        return new Date(date.replace(/-/g, "/")).toLocaleDateString()
      },

      updateProperty(e, id, prop) {
        axios
          .get('/admin/property/' + id + '/' + prop + '/' + e);
      },

      deletePicture(e, imageId, propertyId) {
        axios
          .get('/admin/property/' + propertyId + '/picture/' + imageId + '/delete');
        e.target.parentElement.className += " hidden";
      },

      validateForm(e) {
        e.preventDefault();
        grecaptcha.reset();
        grecaptcha.execute();
      }
    }
});

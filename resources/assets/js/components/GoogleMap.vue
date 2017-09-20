<template lang="pug">
gmap-map(
  :center="{lat:location.lat, lng:location.lng}"
  :zoom="7"
  map-type-id="terrain"
  style="width: 600px; height: 300px;"
)
</template>

<script>
import * as VueGoogleMaps from 'vue2-google-maps';

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyBvWE_sIwKbWkiuJQOf8gSk9qzpO96fhfY',
  }
});

export default {
  components: {
    VueGoogleMaps
  },

  props: [
    'address'
  ],

  data() {
    return {
      location: { lat : 0, lng : 0 },
    }
  },

  mounted() {
     geolocate();
   },

  methods: {
    geolocate: function() {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({'address': this.address}, (results, status) => {
        if (status === 'OK') {
          this.location.lat = results[0].geometry.location.lat();
          this.location.lng = results[0].geometry.location.lng();
        }
      });
    }
  }
}
</script>

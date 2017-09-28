<script>
function initMap() {
  let geocoder = new google.maps.Geocoder();
  const coordinates = new google.maps.LatLng(-34.397, 150.644);

  const mapOptions = {
    zoom: 18,
    fullscreenControl: true,
    center: coordinates,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DEFAULT
    },
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  };

  window.map = new google.maps.Map(document.getElementById("map"), mapOptions);

  if (geocoder) {
    geocoder.geocode({
      'address': window.address
    }, (results, status) => {
      if (status == google.maps.GeocoderStatus.OK) {
        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          map.setCenter(results[0].geometry.location);

          const infoWindow = new google.maps.InfoWindow({
            content: `<b>${address}</b>`,
            size: new google.maps.Size(150, 50)
          });

          const houseMarker = new google.maps.Marker({
            position: results[0].geometry.location,
            map,
            title: address
          });
          google.maps.event.addListener(houseMarker, 'click', () => {
            infoWindow.open(map, houseMarker);
          });

        } else {
          console.log("No results found");
        }
      } else {
        console.log(address);
        console.log(`Geocode was not successful for the following reason: ${status}`);
      }
    });
  }
}

function showMap() {
    var map = window.map;
    document.getElementById('map').classList.remove('hidden');
    document.getElementById('picture-btn').classList.add('not-active');
    document.getElementById('map-btn').classList.remove('not-active');
    var center = map.getCenter();
    google.maps.event.trigger(map, 'resize');
    map.setCenter(center);
}

function hideMap() {
    document.getElementById('map').classList.add('hidden');
    document.getElementById('picture-btn').classList.remove('not-active');
    document.getElementById('map-btn').classList.add('not-active');
}

var map = document.getElementById("map");
if (typeof(map) != 'undefined' && map != null) {
    initMap();
}

function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
        {types: ['geocode']});
}

function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            var circle = new google.maps.Circle({
                center: geolocation,
                radius: position.coords.accuracy
            });

            autocomplete.setBounds(circle.getBounds());
        });
    }
}

function insertInput(responseText) {
    document.getElementById('new-property').append('<input type="hidden" name="files[]" value="'+ responseText +'">');
}

tinymce.init({
    selector: 'textarea#editor',
    branding: false,
    height: 300,
    menubar: false,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code help'
    ],
    toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'],
});
</script>

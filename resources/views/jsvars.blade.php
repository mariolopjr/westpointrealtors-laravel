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

initMap();
</script>

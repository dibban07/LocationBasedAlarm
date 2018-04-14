<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="http://maps.google.com/maps/api/js"></script>
  <script src="gmaps.js"></script>
  <style type="text/css">
    #map {
      width: 400px;
      height: 400px;
    }
  </style>
</head>
<body>
    <h4>Edit Marker</h4>
<form class="edit_marker" action="#" method="post" data-marker-index="{{index}}">
  <p>
    <label for="marker_{{index}}_lat">Latitude:</label>
    <input type="text" id="marker_{{index}}_lat" value="{{lat}}" />
  </p>
  <p>
    <label for="marker_{{index}}_lng">Longitude:</label>
    <input type="text" id="marker_{{index}}_lng" value="{{lng}}" />
  </p>
  <input type="submit" value="Update position" />
</form>
<script>
var map;

// Update position
$(document).on('submit', '.edit_marker', function(e) {
  e.preventDefault();

  var $index = $(this).data('marker-index');

  $lat = $('#marker_' + $index + '_lat').val();
  $lng = $('#marker_' + $index + '_lng').val();

  var template = $('#edit_marker_template').text();

  // Update form values
  var content = template.replace(/{{index}}/g, $index).replace(/{{lat}}/g, $lat).replace(/{{lng}}/g, $lng);

  map.markers[$index].setPosition(new google.maps.LatLng($lat, $lng));
  map.markers[$index].infoWindow.setContent(content);

  $marker = $('#markers-with-coordinates').find('li').eq(0).find('a');
  $marker.data('marker-lat', $lat);
  $marker.data('marker-lng', $lng);
});

// Update center
$(document).on('click', '.pan-to-marker', function(e) {
  e.preventDefault();

  var lat, lng;

  var $index = $(this).data('marker-index');
  var $lat = $(this).data('marker-lat');
  var $lng = $(this).data('marker-lng');

  if ($index != undefined) {
    // using indices
    var position = map.markers[$index].getPosition();
    lat = position.lat();
    lng = position.lng();
  }
  else {
    // using coordinates
    lat = $lat;
    lng = $lng;
  }

  map.setCenter(lat, lng);
});

$(document).ready(function(){
  prettyPrint();
  map = new GMaps({
    div: '#map',
    lat: -12.043333,
    lng: -77.028333
  });

  GMaps.on('marker_added', map, function(marker) {
    $('#markers-with-index').append('<li><a href="#" class="pan-to-marker" data-marker-index="' + map.markers.indexOf(marker) + '">' + marker.title + '</a></li>');

    $('#markers-with-coordinates').append('<li><a href="#" class="pan-to-marker" data-marker-lat="' + marker.getPosition().lat() + '" data-marker-lng="' + marker.getPosition().lng() + '">' + marker.title + '</a></li>');
  });

  GMaps.on('click', map.map, function(event) {
    var index = map.markers.length;
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();

    var template = $('#edit_marker_template').text();

    var content = template.replace(/{{index}}/g, index).replace(/{{lat}}/g, lat).replace(/{{lng}}/g, lng);

    map.addMarker({
      lat: lat,
      lng: lng,
      title: 'Marker #' + index,
      infoWindow: {
        content : content
      }
    });
  });
});
</script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCE0Bxo57qXesi2_yq6sJ-l__7zAKqIef0&libraries=places&callback=initMap&callback=initAutocomplete"
         async defer></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>{{ config('app.name') }}</title>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <style type="text/css">
      ::-webkit-scrollbar {
      width: 8px;
    }
    ::-webkit-scrollbar-track {
      box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
      border-radius: 10px;
      box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }
    /* Scrollable element */
    .some-element::webkit-scrollbar {
    }
    .map{
        width: 600px;
        height: 350px;
    }
  </style>
  <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCz2aOTFtqSfcc-D20-ppZDts0I76ql0y8&libraries=places&language=vi">
    // https://maps.googleapis.com/maps/api/js?key=AIzaSyCz2aOTFtqSfcc-D20-ppZDts0I76ql0y8&language=vi&libraries=placeses,visualization,drawing,geometry,places&region=vn
    </script>
</head>
<body>
  <div id="app">
      <main-app></main-app>
  </div>

  <script src="{{ 'js/jquery.min.js' }}"></script>
  <script src="{{ 'js/bootstrap.min.js' }}"></script>
  <script src="{{ 'js/vue.min.js' }}"></script>
  <script src="{{ 'js/vue-router.min.js' }}"></script>
  <script src="{{ 'js/app.js' }}"></script>
  <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(16.052445, 108.206104),
          zoom: 13,
          mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('searchTextField');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            console.log(place.geometry.location);
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }
    </script>


</body>
</html>
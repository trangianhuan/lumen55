<template>

      <div :id="mapId" class="map"></div>

</template>
<script>
    export default{
        data(){
            return {
                map: null,
                mapId: this.name
            }
        },
        props: ['name', 'lat', 'lng', 'search'],
        mounted(){
            const option ={
                    center: new google.maps.LatLng(this.lat || 16.052445, this.lng || 108.206104),
                    //center: new google.maps.LatLng(this.lat || 16.0669704, this.lng || 108.21295620000001),
                    //(16.0669704, 108.21295620000001)
                    zoom: 17
                };

                //this.map = new google.maps.Map(document.getElementById(this.mapId), option);
                //var marker = new google.maps.Marker({
                //    position: new google.maps.LatLng(this.lat || 16.0669704, this.lng || 108.21295620000001)
                //});
                //marker.setMap(this.map);
                var that = this;
                if(true) that.renderSearch();

        },
        methods:{
            renderSearch(){
                var that = this;
                // Create the search box and link it to the UI element.
                var input = document.getElementById(this.search);
                var searchBox = new google.maps.places.SearchBox(input);
                this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                // Bias the SearchBox results towards current map's viewport.
                this.map.addListener('bounds_changed', function() {
                  searchBox.setBounds(that.map.getBounds());
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
                    var icon = {
                      url: place.icon,
                      size: new google.maps.Size(71, 71),
                      origin: new google.maps.Point(0, 0),
                      anchor: new google.maps.Point(17, 34),
                      scaledSize: new google.maps.Size(25, 25)
                    };
                    console.log(markers);
                    // Create a marker for each place.
                    var marker = new google.maps.Marker({
                      map: that.map,
                      icon: icon,
                      title: place.name,
                      position: place.geometry.location
                    });
                    markers.push(marker);

                    that.map.addListener(marker, 'click', function() {
                      console.log(this.marker.id);
                    });

                    if (place.geometry.viewport) {
                      // Only geocodes have viewport.
                      bounds.union(place.geometry.viewport);
                    } else {
                      bounds.extend(place.geometry.location);
                    }
                  });
                  that.map.fitBounds(bounds);
                });
            }
        }
    }
</script>
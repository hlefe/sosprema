                            <!-- Include Google Maps JS API -->
<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDiAqFfL5kg50DPVHkPdmxetXXH9sAMDOE">
</script>

<!-- Custom JS code to bind to Autocomplete API -->
<!-- find it here: https://github.com/lewagon/google-place-autocomplete/blob/gh-pages/autocomplete.js -->
<!-- We'll detail this file in the article -->
<script type="text/javascript" src="autocomplete.js"></script>
                            <script>
                                function initializeAutocomplete(id) {
  var element = document.getElementById(id);
  if (element) {
    var autocomplete = new google.maps.places.Autocomplete(element, { types: ['geocode'] });
    google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
  }
}

function onPlaceChanged() {
  var place = this.getPlace();

  // console.log(place);  // Uncomment this line to view the full object returned by Google API.

  for (var i in place.address_components) {
    var component = place.address_components[i];
    for (var j in component.types) {  // Some types are ["country", "political"]
      var type_element = document.getElementById(component.types[j]);
      if (type_element) {
        type_element.value = component.long_name;
      }
    }
  }
}

google.maps.event.addDomListener(window, 'load', function() {
  initializeAutocomplete('user_input_autocomplete_address');
});
</script>

  <input class="form-control" id="user_input_autocomplete_address" placeholder="Taper l'adresse ici...">
             
                        
                        
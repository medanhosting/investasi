
function init() {
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
}


var marker;
$( document ).ready(function() {
    var map = new GMaps({
        el: '#map',
        lat: -12.043333,
        lng: -77.028333,
        zoom: 17,
        searchable:true
    });
    GMaps.geolocate({
        success: function(position){
            map.setCenter(position.coords.latitude, position.coords.longitude);
            map.addMarker({
                lat: position.coords.latitude,
                lng: position.coords.longitude,
                draggable: true,
                dragend: function(event) {
                    var lat = event.latLng.lat();
                    var lng = event.latLng.lng();

                    $('#geo-latitude').val(lat);
                    $('#geo-longitude').val(lng);
                }
            });
            $('#geo-latitude').val(position.coords.latitude);
            $('#geo-longitude').val(position.coords.longitude);

            marker = map.markers;
        },
        error: function(error){
            alert('Geolocation failed: '+error.message);
        },
        not_supported: function(){
            alert("Your browser does not support geolocation");
        }
    });

    $('#geocoding_form').click(function(e){
        e.preventDefault();
        map.removeMarker(marker);
        GMaps.geocode({
            address: $('#address').val().trim(),
            callback: function(results, status){
                if(status=='OK'){
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng.lat(), latlng.lng());
                    map.addMarker({
                        lat: latlng.lat(),
                        lng: latlng.lng(),
                        draggable: true,
                        dragend: function(event) {
                            var lat = event.latLng.lat();
                            var lng = event.latLng.lng();

                            $('#geo-latitude').val(lat);
                            $('#geo-longitude').val(lng);
                        }
                    });
                    $('#geo-latitude').val(latlng.lat());
                    $('#geo-longitude').val(latlng.lng());

                    marker = map.markers;
                }
            }
        });
    });
});
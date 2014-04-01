var googleMap;
function initializePlaces() {
	var mapOptions = {
		center: new google.maps.LatLng(38.951705, -92.334072),
		zoom: 11
	};
	googleMap = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	placeMarkers();
}

//Abstract function to be overwritten 
function placeMarkers(){}

google.maps.event.addDomListener(window, 'load', initializePlaces);

//Function to update the placeMarker on the add/Edit Map
$(function() {
	$('#PlaceAddress').change(function() { 
		geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address': $(this).val() }, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				googleMap.setCenter(results[0].geometry.location);
				placeMarker.setPosition(results[0].geometry.location);
				$('#PlaceLatitude').val(results[0].geometry.location.lat());
				$('#PlaceLongitude').val(results[0].geometry.location.lng());
			}
		});
	});
});
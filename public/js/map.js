function initialize() {
var location = {lat:35.65, lng: 139.80};
var map = new google.maps.Map(document.getElementById('map'), { center: location,
zoom: 14
});
var marker = new google.maps.Marker({ position: location,
map: map
}); }
google.maps.event.addDomListener(window, 'load', initialize); 

var infoWindow = new google.maps.InfoWindow({ content: "<div id='content'><img src=''></div>"
});
infoWindow.open(map, marker);
function initMap()
{
  var pune={lat: 18.5204, lng: 73.857};
  var map = new google.maps.Map(document.getElementById('map'),
  {
  zoom: 10,
  center: pune
  });
}

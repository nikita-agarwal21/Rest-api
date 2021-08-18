<?php
    $song = $_POST['name'];

  //  https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyAKMKlaIQdNYpEIdEZSh2l9N_eqgTZbafU&type=video&q=nightcore
  //  https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyAKMKlaIQdNYpEIdEZSh2l9N_eqgTZbafU&type=video&q=nightcore
  //$url="https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyAKMKlaIQdNYpEIdEZSh2l9N_eqgTZbafU&type=video&q=".$song;

  //AIzaSyBmMdGVf0h97eJHw1e9hykMwlCYH0b_YK0
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmMdGVf0h97eJHw1e9hykMwlCYH0b_YK0&callback=initMap&libraries=&v=weekly"

    $ch = curl_init();

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    $rdata=json_decode($result,true);
    $videos=array();
    include_once "GoogleMapsapi.php";
    function initMap()
    {
      const map = new google.maps.Map(
    document.getElementById("map") as HTMLElement,
    {
      zoom: 14,
      center: { lat: 37.77, lng: -122.447 },
    }
  );
    }


   curl_close($ch);


?>

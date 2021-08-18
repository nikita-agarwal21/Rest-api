<?php
    $song = $_POST['name'];


  //  https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyAKMKlaIQdNYpEIdEZSh2l9N_eqgTZbafU&type=video&q=nightcore
  //  https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyAKMKlaIQdNYpEIdEZSh2l9N_eqgTZbafU&type=video&q=nightcore
  $url="https://www.googleapis.com/youtube/v3/search?part=snippet&key=AIzaSyAKMKlaIQdNYpEIdEZSh2l9N_eqgTZbafU&type=video&q=".$song;



    $ch = curl_init();

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);
    $rdata=json_decode($result,true);
    $videos=array();
    include_once "Youtubeapi.php";
    for($i=0;$i<5;$i++)
    {
      $videos[]=$rdata['items'][$i]['id']['videoId'];

    }
    foreach ($videos as $video)
    {
    echo "<iframe width='420' height='315' src='https://www.youtube.com/embed/".$video."' frameborder='0' allowfullscreen></iframe>";
    }
   curl_close($ch);


?>

<?php

$url = "https://api.thingspeak.com/channels/1848875/feeds.json?api_key=0ATKYV8VNB0AL6RJ&results=2";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$resp2 = json_decode($resp, true);

$lat = $resp2["feeds"][0]["field2"];
$long = $resp2["feeds"][0]["field3"];

echo $lat;
?>
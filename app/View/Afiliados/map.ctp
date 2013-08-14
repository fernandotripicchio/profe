<?
$address = "San+Luis+general+paz+1060";
$url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=Argentina";
//$url =  "https://maps.google.com.ar/maps/ms?msid=209598365520331230500.00049efdb22daed2b9068&msa=0&ll=-33.289786,-66.241379&spn=0.150954,0.336113&iwloc=0004aea5cd02903d3f200";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($ch);
curl_close($ch);
$response_a = json_decode($response);
echo $lat = $response_a->results[0]->geometry->location->lat;
echo "<br />";
echo $long = $response_a->results[0]->geometry->location->lng;
?>
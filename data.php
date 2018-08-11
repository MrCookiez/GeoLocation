<?php 

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
   
   //"GetCityDetails" REST API code sample to get visitors IP ADDRESS
   function getIP() {
      foreach (array(
          'HTTP_CLIENT_IP', 
          'HTTP_X_FORWARDED_FOR', 
          'HTTP_X_FORWARDED', 
          'HTTP_X_CLUSTER_CLIENT_IP', 
          'HTTP_FORWARDED_FOR', 
          'HTTP_FORWARDED', 
          'REMOTE_ADDR') as $key) {
         if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
               if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                  return $ip;
               }
            }
         }
      }
   }
   // Get the result of getIP function and place it into $ip variable
   $ip = getIP();

   //Use REST API to get visitors data by URL + User's current IP ADDRESS from previous var
   $json = file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn='.$ip); 

   //"json_decode()" will take JSON and convert it into a PHP array, "true" == Assosiated Array
   $data = json_decode($json, true);

   //Test the result
   //echo '<b>'. $ip .'</b> resolves to:'. print_r($data);

   //Assosiate Array with selected data from REST API of "geobytes"
   $details = array(
        //Basic Information
        "ip"=>$data["geobytesipaddress"],
        "fullName"=>$data["geobytesfqcn"],
        "short"=>$data["geobytesregionlocationcode"],
        //More Information (will be displayed only in Premium Tab)
        "country"=>$data["geobytescountry"],
        "city"=>$data["geobytescity"],
        "lat"=>$data["geobyteslatitude"],
        "long"=>$data["geobyteslongitude"],
        "timezone"=>$data["geobytestimezone"],
        "currency"=>$data["geobytescurrency"]        
        );
    //Output data for external use in JSON format
    $api = json_encode($details);
    
    echo print_r($api, true);

?>
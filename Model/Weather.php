<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Weather
 *
 * @author webre
 */
class Weather implements Weather_Interface {

    //put your code here
    private $url;

    public function __construct() {
		echo "<b>". $_POST['countries'] ." Weather State</b><br><br>";
		$this->get_current_time();
       
    }

    public function get_cities() {
   
    }

    public function get_weather($cityiid) {

       $apiKey = "e996a034920f901c3d43498fbe9113be";
//       $cityId = "346030";
	    $cityId = "$cityiid";
//		var_dump($cityId);
//    	echo "<br>";
		$cityId = str_replace("<br>", "", $cityId); 
//		var_dump($cityId);
       $googleApiUrl= "api.openweathermap.org/data/2.5/weather?id=". $cityId."&appid=". $apiKey;
		//echo $googleApiUrl;
       $ch = curl_init();

     curl_setopt($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
     curl_setopt($ch, CURLOPT_VERBOSE, 0);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     $response = curl_exec($ch);

     curl_close($ch);
     $data1 = json_decode($response,true);
//     echo "<pre>";
//	 print_r($data1);
//	 echo "</pre>";
	 echo"<br>";
	 echo $data1["weather"][0]["description"]."<br>";	
	 echo "<img src='http://openweathermap.org/img/w/".$data1['weather'][0]['icon']."png'>";
//	 <img src="http://openweathermap.org/img/w/<?php echo {here:setIconNameFromResponse}
     echo $data1["main"]["temp_min"]."<span>&#8451;</span> ";
	 echo $data1["main"]["temp_max"]."<span>&#8451;</span> ";	
	 echo "<br>";
	 echo "humidity:".$data1["main"]["humidity"]."%";
	 echo "<br>";
	 echo "wind".$data1["wind"]["speed"]." Km/h";
	
//     $currentTime = time();
//	 echo "hi".$currentTime;
		
	

      
    }

    public function get_current_time() {
		
	   //$date = '3-03-2021';
		
	   $date = date("Y-m-d");
	   echo date('l', strtotime($date)) ." ";
	   date_default_timezone_set("Africa/Cairo");
	   $hourMin = date('H:i a');
	   echo $hourMin;
		echo "<br>";
		echo date("j F, Y");
		
	   
	    // still time here 
	   //echo m ([ .\t-])* dd [,.stndrh\t ]+ y;
        
    }

}

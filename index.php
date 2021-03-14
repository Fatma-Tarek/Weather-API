<?php
require("autoload.php");
ini_set('memory_limit', '-1');
$weather = new Weather();
//$egyption_cities = $weather->get_cities();
  
if (isset($_POST['Submit1'])) {
	$data = file_get_contents('resources/EG_city_list.json');
	$data = json_decode($data,true);
//	echo "<pre>";
//			 print_r($data);
//			 echo "</pre>";
	//$date = '3-03-2021';
//	$date = date("Y-m-d");
//	echo date('l', strtotime($date));
//	$hourMin = date('H:i');
//	echo $hourMin;
	$country = $_POST['countries'];
	//echo $country;
	//echo "<br>";
	for($j=0;$j<count($data);$j++)
	{
		 foreach($data[$j] as $key => $value)
			{
				if($data[$j]["name"] == $country)
				{
					$idCountry= $data[$j]["id"]."<br>";
				}			
			}
	}
//	echo "<br>";
//	echo $idCountry;
	
	$egyption_cities = $weather->get_weather($idCountry);
}
?>
<html>

<head>
	<meta charset="UTF-8">
	<title>

	</title>
</head>

<body>
	<form method="POST">
	<select name='countries'>
		<?php
			$data = file_get_contents('resources/EG_city_list.json');
			$data = json_decode($data,true);
////		    echo "Hi";
////		     var_dump($data);
//			 echo "<pre>";
//			 print_r($data);
//			 echo "</pre>";
		 for($i=0;$i<count($data);$i++){
		    foreach($data[$i] as $key => $value)
			{
				if($key == "name")
				{
					echo "<option value=".$value.">".$value."</option>";
				}			
			}}
		   
		
		?>
	</select>
		<input type="Submit" name="Submit1" value="GetWeather" />
		</form>
</body>

</html>

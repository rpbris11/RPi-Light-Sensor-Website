<?php

$servername = "localhost";

$dbname = "ltr_data";

$username = "admin";
$password = "Buttonpusher5";

$api_key_value = "822c9a37";

$api_key = $sensor = $location = $uv_light = $uv_index = $ambient_light = $lux = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$api_key = test_input($_POST["api_key"]);
	if($api_key == $api_key_value){
		$sensor = test_input($_POST["sensor"]);
		$location = test_input($_POST["location"]);
		$uv_light = test_input($_POST["uv_light"]);
		$uv_index = test_input($_POST["uv_index"]);
		$ambient_light = test_input($_POST["ambient_light"]);
		$lux = test_input($_POST["lux"]);

		$conn = new mysqli($servername, $username, $password, $dbname);
		if($conn->connect_error){
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO SensorData (sensor, location, uv_light, uv_index, ambient_light, lux)
		VALUES ('" . $sensor . "', '" . $location . "', '" . $uv_light . "', '" . $uv_index . "', '" . $ambient_light . "', '" . $lux . "')";

		if($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		}
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
	else {
		echo "Wrong API Key provided.";
	}

}
else {
	echo "No data posted with HTTP POST.";
}

function test_input($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

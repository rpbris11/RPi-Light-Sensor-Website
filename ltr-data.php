<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  background-color: #333;
}
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.topnav a.active {
  background-color: #4281F5;
  color: white;
}
</style>
<meta http-equiv="refresh" content="7" > 
</head>
<body>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="ltr-data.php">Sensor Data</a>
  <a href="documentation.php">Documentation</a>
</div>

<div style="padding-left:16px">
  <h2>LTR390 Ultraviolet and Ambient Light Sensor</h2>
  <p>Data updated in real time.</p>
</div>
<body>
<?php

$servername = "localhost";
$dbname = "ltr_data";
$username = "admin";
$password = "Buttonpusher5";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT sensor, location , uv_light, uv_index, ambient_light, lux, reading_time FROM SensorData ORDER BY reading_time DESC LIMIT 40";

echo '<table cellspacing="5" cellpadding="5">
	<tr>
	<td>Sensor</td>
	<td>Location</td>
	<td>UV Light</td>
	<td>UV Index</td>
	<td>Ambient Light</td>
	<td>Lux</td>
	<td>Timestamp</td>
	</tr>';

if($result = $conn->query($sql)){
	while($row = $result->fetch_assoc()){
		$row_sensor = $row["sensor"];
		$row_location = $row["location"];
		$row_uv_light = $row["uv_light"];
		$row_uv_index = $row["uv_index"];
		$row_ambient_light = $row["ambient_light"];
		$row_lux = $row["lux"];
		$row_reading_time = $row["reading_time"];
		//$row_reading_time = date("Y-m-d H:i:s", strtotime("row_reading_time - 4 hours"));

		echo '<tr>
			<td>' . $row_sensor . '</td>
			<td>' . $row_location . '</td>
			<td>' . $row_uv_light . '</td>
			<td>' . $row_uv_index . '</td>
			<td>' . $row_ambient_light . '</td>
			<td>' . $row_lux . '</td>
			<td>' . $row_reading_time . '</td>
			</tr>';
	}
	echo '</table>';
	$result->free();
}

$conn->close();
?>
</table>
</body>
</html>

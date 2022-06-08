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
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="ltr-data.php">Sensor Data</a>
  <a href="documentation.php">Documentation</a>
</div>

<div style="padding-left:16px">
  <h2>A Short Introduction</h2>
  <p>In this project, my teammate Billy Roberts and I, Ryan Brisbane,
   were asked to combine a sensor with a Raspberry Pi to develop a small
    website that reports the sensor's data in real time.
  <br><br>Pictured below is our Pi and the connected sensor, which reads
   both UV and ambient light and subsequently calculates UV index and lux.
  </p>
</div>

<div class="row">
	<div class="column">
		<img src="img_pi.jpg" alt="Raspberry Pi" style="width:100%">
	</div>
	<div class="column">
		<img src="img_sensor.jpg" alt="Sensor Connected to Pi" style="width:100%">
	</div>
</div>

</body>
</html>

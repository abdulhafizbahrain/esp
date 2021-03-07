<!--
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/cloud-weather-station-esp32-esp8266/

  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.

  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
-->
<?php
include_once('esp-database.php');

// Keep this API Key value to be compatible with the ESP code provided in the project page. If you change this value, the ESP sketch needs to match
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $sensor = $location = $value1 = $value2 = $value3 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if ($api_key == $api_key_value) {
        $sensor = test_input($_POST["sensor"]);
        $location = test_input($_POST["location"]);
        $value1 = test_input($_POST["value1"]);
        $value2 = test_input($_POST["value2"]);
        $value3 = test_input($_POST["value3"]);

        echo "$sensor";
        echo "$location";
        echo "$value1";
        echo "$value2";
        echo "$value3";

        // $result = insertReading($sensor, $location, $value1, $value2, $value3);
        // echo $result;
    } else {
        echo "Wrong API Key provided.";
    }
} else {
    echo "No data posted with HTTP POST.";
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <link rel="stylesheet" type="text/css" href="esp-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<header class="header">
    <h1> ESP Weather Station</h1>
    <form method="get">
        <input type="number" name="readingsCount" min="1" placeholder="Number of readings (<?php echo $readings_count; ?>)">
        <input type="submit" value="UPDATE">
    </form>
</header>

<body>
    <?php
    echo "$sensor";
    echo "$location";
    echo "$value1";
    echo "$value2";
    echo "$value3";

    ?>


</body>

</html>
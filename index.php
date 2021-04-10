<?php
    //Check if IP is passed
    if(!empty($_GET['ip']))
    {
        //assign this a value
        $ip = $_GET['ip'];
        $url = "http://api.ipinfodb.com/v3/ip-city/?key=<api-key>&ip=".urlencode($ip)."&format=json";

        $getResult = json_decode(file_get_contents($url));

        $getResult;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="padding: 20px; font-family: sans-serif">
<center>
<h1>IP Look Up</h1>
    <form action="" method="get">
        <input type="text" name="ip" id="ip" placeholder="Enter IP address">
        <input type="submit" value="check city">
    </form>

    <div class="result" style="text-align: left; margin: 10px auto; position: absolute; left: 45%; ">

    <?php
    //Display results here
        if (isset($getResult) && !empty($getResult))
        {
            echo "<b>IP Address: </b>". $getResult->ipAddress ."<br>".
                 "<b>Country Name: </b>".$getResult->countryName."<br>".
                 "<b>Region Name: </b>".$getResult->regionName."<br>".
                 "<b>City Name: </b>".$getResult->cityName."<br>".
                 "<b>Zip Code: </b>".$getResult->zipCode."<br>".
                 "<b>Latitude: </b>".$getResult->latitude."<br>".
                 "<b>Longitude: </b>".$getResult->longitude."<br>".
                 "<b>Time zone: </b>".$getResult->timeZone;
        }

    ?>
 
    </div>
</center>
</body>
</html>

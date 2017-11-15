<?php
$json = file_get_contents("https://swapi.co/api/people/1/?format=json");
$json_data = json_decode($json, true);
echo $json_data["name"];
?>
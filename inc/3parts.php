<?php
header('Access-Control-Allow-Origin: *');
/*
 * In this case I have used Composer to install Twig
 * I have created a folder name 'twigTemplates' for my html templates and
 * I have create a second folder named 'compilationCache' for The template engines cache
 * This example is based on http://twig.sensiolabs.org/doc/api.html
 */
require_once 'vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('twigTemplates');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('3parts.html.twig');

$Weather = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Roskilde&id=524901&APPID=594f8aa3c72ebe722f821e550b87f209');
$Weather = json_decode($Weather);

$Temperatur = $Weather->main->temp-273.15;
$Humidity = $Weather->main->humidity;
$sunrise = $Weather->sys->sunrise;
$sunrise = gmdate("Y-m-d H:i:s", $sunrise);
$sunset = $Weather->sys->sunset;
$sunset = gmdate("Y-m-d H:i:s", $sunset);
$windSpeed = $Weather->wind->speed;

echo $template->render(array('Weather' => $Temperatur,'Humidity' => $Humidity,'sunrise' => $sunrise,'sunset' => $sunset,'windspeed' => $windSpeed,'Title' => '3 Part'));

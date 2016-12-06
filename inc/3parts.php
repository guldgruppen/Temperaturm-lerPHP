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

$WeatherRoskilde = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Roskilde&id=524901&APPID=594f8aa3c72ebe722f821e550b87f209');
$WeatherCopenhagen = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Copenhagen&id=524901&APPID=594f8aa3c72ebe722f821e550b87f209');
$WeatherAarhus = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Aarhus&id=524901&APPID=594f8aa3c72ebe722f821e550b87f209');

$WeatherRoskilde = json_decode($WeatherRoskilde);
$WeatherCopenhagen = json_decode($WeatherCopenhagen);
$WeatherAarhus = json_decode($WeatherAarhus);


$TemperaturRoskilde = number_format((float)$WeatherRoskilde->main->temp-273.15, 2, ',', '');
$HumidityRoskilde = $WeatherRoskilde->main->humidity;
$sunriseRoskilde = $WeatherRoskilde->sys->sunrise;
$sunriseRoskilde = gmdate("Y-m-d H:i:s", $sunriseRoskilde);
$sunsetRoskilde = $WeatherRoskilde->sys->sunset;
$sunsetRoskilde = gmdate("Y-m-d H:i:s", $sunsetRoskilde);
$windSpeedRoskilde = $WeatherRoskilde->wind->speed;

$TemperaturCopenhagen = number_format((float)$WeatherCopenhagen->main->temp-273.15, 2, ',', '');
$HumidityCopenhagen = $WeatherCopenhagen->main->humidity;
$sunriseCopenhagen = $WeatherCopenhagen->sys->sunrise;
$sunriseCopenhagen = gmdate("Y-m-d H:i:s", $sunriseCopenhagen);
$sunsetCopenhagen = $WeatherCopenhagen->sys->sunset;
$sunsetCopenhagen = gmdate("Y-m-d H:i:s", $sunsetCopenhagen);
$windSpeedCopenhagen = $WeatherCopenhagen->wind->speed;

$TemperaturAarhus = number_format((float)$WeatherAarhus->main->temp-273.15, 2, ',', '');
$HumidityAarhus = $WeatherAarhus->main->humidity;
$sunriseAarhus = $WeatherAarhus->sys->sunrise;
$sunriseAarhus = gmdate("Y-m-d H:i:s", $sunriseAarhus);
$sunsetAarhus = $WeatherAarhus->sys->sunset;
$sunsetAarhus = gmdate("Y-m-d H:i:s", $sunsetAarhus);
$windSpeedAarhus = $WeatherAarhus->wind->speed;


echo $template->render(array(
    'WeatherRoskilde' => $TemperaturRoskilde,
    'HumidityRoskilde' => $HumidityRoskilde,
    'sunriseRoskilde' => $sunriseRoskilde,
    'sunsetRoskilde' => $sunsetRoskilde,
    'windspeedRoskilde' => $windSpeedRoskilde,

    'WeatherCopenhagen' => $TemperaturCopenhagen,
    'HumidityCopenhagen' => $HumidityCopenhagen,
    'sunriseCopenhagen' => $sunriseCopenhagen,
    'sunsetCopenhagen' => $sunsetCopenhagen,
    'windspeedCopenhagen' => $windSpeedCopenhagen,

    'WeatherAarhus' => $TemperaturAarhus,
    'HumidityAarhus' => $HumidityAarhus,
    'sunriseAarhus' => $sunriseAarhus,
    'sunsetAarhus' => $sunsetAarhus,
    'windspeedAarhus' => $windSpeedAarhus,
    ));

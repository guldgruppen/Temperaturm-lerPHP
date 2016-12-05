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
$template = $twig->loadTemplate('lokaler.html.twig');
$response1 = file_get_contents('http://localhost:28553/TempService.svc/Temperatur/get/1');
$response1 = json_decode($response1);
$response2 = file_get_contents('http://localhost:28553/TempService.svc/Temperatur/get/1');
$response2 = json_decode($response2, true);
echo $template->render(array('Lokale1' => $response1, 'Lokale2' => $response2,'Title' => 'Lokaler'));

$temp = $_GET['temp'];
//$temp = $response1->Data;

if ($temp < "15")
{
    echo "<div class=\"alert alert-info col-xs-12 col-sm-12 col-md-6 col-lg-6\">
        <strong>Temperaturen er for lav!</strong>
    </div>";    }
else if (15 <= $temp && $temp < 18)
{
    echo "<div class=\"alert alert-info col-xs-12 col-sm-12 col-md-6 col-lg-6\">
        <strong>Temperaturen er ved at være lidt for lav</strong>
    </div>";
}
else if (18 <= $temp && $temp < 22)
{
    echo "<div class=\"alert alert-success col-xs-12 col-sm-12 col-md-6 col-lg-6\">
        <strong>Temperaturen er perfekt</strong>
    </div>";
}
else if (22 <= $temp && $temp < 25)
{
    echo "<div class=\"alert alert-warning col-xs-12 col-sm-12 col-md-6 col-lg-6\">
        <strong>Temperaturen er ved at være for høj!</strong>
    </div>";
}
else if(25 <= $temp)
{
    echo "<div class=\"alert alert-danger col-xs-12 col-sm-12 col-md-6 col-lg-6\">
        <strong>Temperaturen er for høj!</strong>
    </div>";
}



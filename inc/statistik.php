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
$template = $twig->loadTemplate('statistik.html.twig');

if(isset($_POST["date1"]))
{
    $date = ($_POST["date1"]);
    $date = str_replace("/","-",$date);
    $url = 'http://localhost:28553/TempService.svc/Temperatur/GetStatistik/1/'.$date;
    $response1 = file_get_contents($url);

    echo $template->render(array('response1'=>$response1));
}
else if(isset($_POST["dateFra"]) && isset($_POST["dateTil"]))
{
    $dateFra = ($_POST["dateFra"]);
    $dateTil = ($_POST["dateTil"]);
    $dateFra = str_replace("/","-",$dateFra);
    $dateTil = str_replace("/","-",$dateTil);
    $url = 'http://localhost:28553/TempService.svc/Temperatur/GetStatistik/'.$dateFra.'/'.$dateTil.'/1';
    $response2 = file_get_contents($url);

    echo $template->render(array('response2'=>$response2));
}
else {
    echo $template->render(array('Data' => "HEJ"));
}

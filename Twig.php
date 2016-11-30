<?php
header('Access-Control-Allow-Origin: *');
/*
 * In this case I have used Composer to install Twig
 * I have created a folder name 'twigTemplates' for my html templates and
 * I have create a second folder named 'compilationCache' for The template engines cache
 * This example is based on http://twig.sensiolabs.org/doc/api.html
 */

require_once '/vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('twigTemplates');
$twig = new Twig_Environment($loader);
$template = $twig->loadTemplate('index.html.twig');

$response = file_get_contents('http://localhost:28553/TempService.svc/Temperatur/GetNextFiveDays');
$response = json_decode($response);

echo $template->render(array('Data' => $response, 'Verden' => 'World'));

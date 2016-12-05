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
echo $template->render(array('Data' => "HEJ", 'Title' => 'Statistik'));
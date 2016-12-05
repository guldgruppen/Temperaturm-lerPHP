<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29-11-2016
 * Time: 12:11
 */

if (!isset($_GET['page'])){

    include ('home.php');
}
else{
    $side = $_GET['page'];
    switch ($side){
        case 'home':
            include ('home.php');
            break;
        case 'lokaler':
            include('lokaler.php');
            break;
        case 'statistik':
            include ('statistik.php');
            break;
        case '3parts':
            include ('3parts.php');
            break;
        default:
            include ('home.php');
    }
}
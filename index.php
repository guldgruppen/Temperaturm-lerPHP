<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29-11-2016
 * Time: 12:15
 */

?>

<html>
<link rel="stylesheet" href="MyStyleSheet.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<header>
    <div class="row">
        <div class="text-center col-md-offset-3 col-md-6">
            <h1 class="h1-custom" style="font-family: 'Agency FB'">Temperature Advicer</h1>
            <br>
        </div>
    </div>

    <div class="row col-md-offset-3 col-md-6">
        <ul class="nav nav-tabs nav-justified">
            <li a role="presentation"><a href="?page=home">Home</a></li>
            <li a role="presentation"><a href="?page=lokaler">Lokale</a></li>
            <li a role="presentation"><a href="?page=statistik">Statistik</a></li>
            <li a role="presentation"><a href="?page=3parts">3. Parts</a> </li>
        </ul>
    </div>


</header>
<body>

<div class="col-md-offset-3 col-md-6">
    <?php include_once('inc/pages.php') ?>
</div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    var url = window.location;
    // Will only work if string in href matches with location
    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
    $('ul.nav a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
</script>
</html>


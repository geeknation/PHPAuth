<?php

include('../Config.php');
include('../Auth.php');

$dbh = new PDO('mysql:host=localhost;dbname=database', 'username', 'password');

//creating a config-object is enough at this point
$config = new PHPAuth\Config($dbh);
$auth   = new PHPAuth\Auth($dbh, $config);

?>
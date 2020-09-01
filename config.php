<?php
ob_start(); //Turns on output buffering 

date_default_timezone_set("Europe/London");

try {
    $con = new PDO("mysql:dbname=the ebse;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (PDOException $e) {
    echo "Connection error: " . $e->getMessage();
}
?>
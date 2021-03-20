<?php


$host = "localhost";
$username = "root";
$password = "test";
$dbname = "test"; // will use later
$dsn = "mysql:host=$host;dbname=$dbname"; // will use later
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

//    $host       = "51.38.37.150";
//    $username   = "Student7";
//    $password   = 'Student$YT7ZGIQT';
//    $dbname     = "test";
//    $dsn        = "mysql:host=$host;dbname=$dbname";
//    $options    = array(
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//    );
<?php

/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 *
 */

//require "dbConfig.php";   //not working

//
//    $host       = "51.38.37.150";
//    $username   = "Student7";
//    $password   = 'Student$YT7ZGIQT';
//    $dbname     = "test";
//    $dsn        = "mysql:host=$host;dbname=$dbname";
//    $options    = array(
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//    );


    $host = "localhost";
    $username = "root";
    $password = "PASSWORD";
    $dbname = "test"; // will use later
    $dsn = "mysql:host=$host;dbname=$dbname"; // will use later
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);

    echo "Database and table users created successfully.";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
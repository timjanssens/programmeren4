<?php

/**
 * Open a connection via PDO to create a
 * new database and table with structure.
 * als je met de remote SQL server werkt, moet je geen
 * database meer aanmaken, die bestaat al bv Student1
 */

require "config.php";

try {
    $connection = new \PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("data/fric-frac-ddl.sql");
    echo $sql;
    $connection->exec($sql);

    echo "Tables EventCategory, EventTopic en Event created successfully.";
} catch (\PDOException $error) {
    echo $sql . " " . $error->getMessage();
}
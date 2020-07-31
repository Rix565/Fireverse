<?php

session_start();
define("HOST", "127.0.0.1");
define("DB_NAME", "fireverse_db");
define("USER", "root");
define("PASS", "");

try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<p class='error'>An error has occured for the db's connection.Please contact the manager with this error:</p>";
    echo "<p class='error'>{$e}</p>";
    exit;
}


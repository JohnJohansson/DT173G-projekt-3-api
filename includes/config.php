<?php
// a config file for the database connection

// auto lodes the classes
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

// Database settings localhost
define("DBHOST", 'localhost'); //host
define("DBUSER", ''); //name of user
define("DBPASS", ''); //password 
define("DBDATABASE", ''); //name of database

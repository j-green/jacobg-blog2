<?php
require_once("../model/database.php");

$connection = new mysqli($host, $username, $password);

if ($connection->connect_error) {
    die("<p>Error: " . $connection->connect_error . "</p>");
} 

$exists = $connection->select_db($database);

if(!$exists) {
    $query = $connection->query("CREATE DATABASE $database");
    
if($query) {
    echo "<p>Successfully created database:  ". $database . "</p>";
    }
}


else{
    echo "<p>Database already .</p>";
}
$query = $connection->query("CREATE TABLE posts ("
        ."id int(11) NOT NULL AUTO_INCREMENT,"
        ."title varchar(225) NOT NULL,"
        ."post tex NOT NULL,"
        ."PRIMARY KEY (id))");

if($query) {
    echo"<p>Succesfully created table: posts</p>";
}
else{
    echo "<p>$connection->error</p>";
}

$connection->close();
        
<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "crud", 3308);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "\n";


if (isset($_POST['save'])){
    $name=$_POST['name'];
    $location=$_POST['location'];

    $mysqli->query("INSERT INTO data(name,location)VALUES ('$name','$location')")or 
    die($mysqli->error);

}
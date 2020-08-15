<?php

$mysqli = new mysqli("127.0.0.1", "root", "", "crud", 3308);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


if (isset($_POST['save'])){
    $name=$_POST['name'];
    $location=$_POST['location'];

    $mysqli->query("INSERT INTO data(name,location)VALUES ('$name','$location')")or 
    die($mysqli->error);

    $_SESSION['message']="Record has been saved";
    $_SESSION['msg_type']="success";

     header("location index.php");

}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id")or die($mysqli->error);

    $_SESSION['message']="Record has been deleted";
    $_SESSION['msg_type']="danger";

    header("location index.php");
}
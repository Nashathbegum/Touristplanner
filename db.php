<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "touristplanner";


$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $db
);


if(!$conn)
{
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>
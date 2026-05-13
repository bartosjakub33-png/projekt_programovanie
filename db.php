<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "todo_app";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Chyba pripojenia: " . mysqli_connect_error());
}
?>
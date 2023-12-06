<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "libreria";

$conn = new mysqli($hostname, $username, $password, $db);

if ($conn->connect_error) {
    die("DB failure". $conn->connect_error);
}
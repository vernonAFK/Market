<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "market";

$conn = new mysqli($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection error!");
}
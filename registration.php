<?php
require_once("db.php");

$login = $_POST["login"];
$password = md5($_POST["password"]);
$email = $_POST["email"];

$sql = "SELECT `id` FROM `users` WHERE login = '$login' OR email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $conn->close();
    header("Location: auth.php?error=2");
    exit;
}

setcookie("username", $login, time() + 300);

$sql = "INSERT INTO `users` (login, password, email) VALUES ('$login', '$password', '$email')";
$conn->query($sql);

$conn->close();
header("Location: profile.php");
<?php
require_once("db.php");

$login = $_POST["login"];
$password = md5($_POST["password"]);

$sql = "SELECT `id` FROM `users` WHERE login = '$login' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    setcookie("username", $login, time() + 300);
    $conn->close();
    header("Location: profile.php");
    exit;
}

$conn->close();
header("Location: auth.php?error=1");
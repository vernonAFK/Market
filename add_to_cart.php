<?php
if (!isset($_COOKIE["username"])) {
    header("Location: auth.php");
    exit;
}
require_once("db.php");

$login = $_COOKIE["username"];
$good_id = $_GET["add"];

$sql = "SELECT `id` FROM `users` WHERE login = '$login'";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
    $user_id = $row['id'];
}

$sql = "SELECT * FROM `cart` WHERE good_id = '$good_id' AND user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "UPDATE `cart` SET count = count + 1 WHERE good_id = '$good_id'";
    $conn->query($sql);
    $conn->close();
    
    header("Location: index.php");
    exit;
}

$sql = "INSERT INTO `cart` (good_id, user_id) VALUES ('$good_id', '$user_id')";
$conn->query($sql);
$conn->close();

header("Location: index.php");
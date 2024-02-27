<?php
require_once('db.php');

$login = $_COOKIE["username"];
$count_user_goods = 0;

$sql = "SELECT `id` FROM `users` WHERE login = '$login'";
$result = $conn->query($sql);

while($row = $result->fetch_row()) {
    $user_id = $row[0];
}

$good_ids = array();
$count = array();

$sql = "SELECT * FROM `cart` WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        array_push($good_ids, $row[1]);
        array_push($count, $row[3]);
    }
}

$name = array();
$price = array();

foreach ($good_ids as $good_id) {
    $sql = "SELECT * FROM `goods` WHERE id = '$good_id'";
    $result = $conn->query($sql);

    while ($row = $result->fetch_row()) {
        array_push($name, $row[1]);
        array_push($price, $row[2]);
    }
    $count_user_goods = $count_user_goods + $result->num_rows;
}

$conn->close();
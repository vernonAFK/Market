<?php
require_once('db.php');

$count_goods = 0;

$sql = "SELECT * FROM `goods`";
$result = $conn->query($sql);

$id = array();
$name = array();
$price = array();
$count = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_row()) {
        array_push($id, $row[0]);
        array_push($name, $row[1]);
        array_push($price, $row[2]);
        array_push($count, $row[3]);
    }
    $count_goods = $result->num_rows;
}
$conn->close();
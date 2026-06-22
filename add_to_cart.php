<?php
session_start();

if (!isset($_GET['title']) || !isset($_GET['price'])) {
    die("Missing product data");
}

$title = $_GET['title'];
$price = $_GET['price'];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$_SESSION['cart'][] = [
    "title" => $title,
    "price" => $price
];

header("Location: index.php?added=1");
exit();
?>
<?php
session_start();
?>

<h2>Your Cart</h2>

<?php
if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
    echo "Your cart is empty";
} else {
    foreach ($_SESSION['cart'] as $item) {
        echo "<p><b>" . $item['title'] . "</b> - $" . $item['price'] . "</p>";
    }
}
?>
<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> The Agatha Christie Bookstore </title>
        <link rel="stylesheet" href="styles.css">
        <!-- <a href="cart.php">
            <img src="images/cart.png" alt="Cart" class=""cart-icon">
        </a>  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    </head>
    <body>

    <img src="images/Black-Monochrome-Business-LinkedIn-Banner.png" class="banner">

    <a href="cart.php" class="cart-icon">
        <i class="fa-solid fa-cart-shopping"></i>
    </a>

    <h3> Books in Stock </h3>

    <div class="books">
    <?php
        $servername = "sql5.freesqldatabase.com";
        $username = "sql5831070";
        $password = "RdchjtB6MC";
        $dbname = "sql5831070";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    ?>

    <?php
    // Add command to pull from database
        // session.start();
        $sqlSelect = "SELECT title, author, price, image_name FROM books";
        $result = $conn->query($sqlSelect);

        if ($result->num_rows > 0) {
            // Output of data of each rows
            while ($row = $result->fetch_assoc()) {
                echo "<div class='book-card'>";
                echo "<img src='images/" . $row["image_name"] . "' width='150'>";
                echo "<h4>" . $row["title"] . "</h4>";
                echo "<p>" . $row["author"] . "</p>";
                echo "<p><b>$" . $row["price"] . "</b></p>";
                echo "<a href='add_to_cart.php?title=" . urlencode($row['title']) . "&price=" . $row['price'] . "'>
                <button>Add to Cart</button>
                </a>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    ?>
    </div>
    <?php if (isset($_GET['added'])) { ?>
        <script>
        window.onload = function() {
        alert("Book added to cart");
        };
        </script>
<?php } ?>
    </body>
</html>
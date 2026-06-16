<!DOCTYPE html>
<html>
    <head>
        <title> The Agatha Christie Bookstore </title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>

    <img src="images/Black-Monochrome-Business-Linkedin-Banner.png" class="banner">
    <h3> Books in Stock </h3>

    <div class="books">
    <?php
        $servername = "sql5.freesqldatabase.com";
        $username = "sql5829976";
        $password = "eYjbtGPu2K";
        $dbname = "sql5829976";

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
        $sqlSelect = "SELECT title, author, isbn, book_description, price, image FROM books";
        $result = $conn->query($sqlSelect);

        if ($result->num_rows > 0) {
            // Output of data of each rows
            while($row = $result->fetch_assoc()) {
                echo "<img src='images/" . $row["image"] . "' width='150'><br>" . "<b>" .
                $row["title"] . "</b><br>" .
                $row["author"] . "<br>" . "$" .
                $row["price"]. "<br><br>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    ?>
    </div>
    </body>
</html>
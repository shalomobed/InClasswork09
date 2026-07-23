```<?php
$host = "localhost";
$user = "sobed1";
$pass = "sobed1";
$dbname = "sobed1";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Could not connect to server\n";
    die("Connection failed: " . $conn->connect_error);
}

// Create table
$sql = "CREATE TABLE IF NOT EXISTS BOOKS (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    author VARCHAR(50) NOT NULL,
    price FLOAT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table BOOKS created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Insert records (Create)
$sql1 = "INSERT INTO BOOKS (title, author, price) VALUES ('Stewie\'s Adventures', 'Stewie Griffin', 15.99)";
$sql2 = "INSERT INTO BOOKS (title, author, price) VALUES ('Peter\'s Guide to Life', 'Peter Griffin', 12.99)";
$sql3 = "INSERT INTO BOOKS (title, author, price) VALUES ('Lois\'s Recipes', 'Lois Griffin', 10.99)";
$sql4 = "INSERT INTO BOOKS (title, author, price) VALUES ('Brian\'s Wisdom', 'Brian Griffin', 9.99)";

if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE) {
    echo "New records created successfully\n";
} else {
    echo "Error: " . $conn->error . "\n";
}

// Read records (Select) - FIXED
$sql = "SELECT * FROM BOOKS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Books in the database:\n";
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Title: " . $row["title"] . " - Author: " . $row["author"] . " - Price: $" . $row["price"] . "\n";
    }
} else {
    echo "0 results\n";
}

// Update record
$sql = "UPDATE BOOKS SET price = 14.99 WHERE title = 'Stewie\'s Adventures'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully\n";
} else {
    echo "Error updating record: " . $conn->error . "\n";
}

// Delete record
$sql = "DELETE FROM BOOKS WHERE title = 'Peter\'s Guide to Life'";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully\n";
} else {
    echo "Error deleting record: " . $conn->error . "\n";
}

// Close connection
$conn->close();
?>```
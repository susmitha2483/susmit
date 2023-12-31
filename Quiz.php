<?php
// Assuming you have a MySQL database with a table named 'quiz_results'
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process quiz submissions and store results in the database
    $q1 = $_POST["q1"];
    $q2 = $_POST["q2"];

    // Store quiz results in the database
    $sql = "INSERT INTO quiz_results (q1, q2) VALUES ('$q1', '$q2')";

    if ($conn->query($sql) === TRUE) {
        echo "Quiz submitted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

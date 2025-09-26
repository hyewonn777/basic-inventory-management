<?php
// Database configuration
$host = 'localhost';        // MySQL server hostname
$username = 'root';         // MySQL username
$password = '';             // MySQL password (leave empty if not set)
$dbname = 'demo_db';     // Database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully" . "<br>";
?>

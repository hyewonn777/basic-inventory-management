<?php
// Include the configuration file
include 'config.php';

// Query the students table
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . 
             " - Name: " . $row["name"] . 
             " - Email: " . $row["email"] . 
             " - Course: " . $row["course"] . "<br>";
    }
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>

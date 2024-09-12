<?php
$servername = "localhost";  // Usually "localhost"
$username = "root";         // Replace with your database username
$password = "";             // Replace with your database password
$dbname = "db_pets";       // Your database name

try {
    // Create a new PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Echo success message (optional)
    // echo "Connected successfully";
} catch(PDOException $e) {
    // If there's an error, output it
    echo "Connection failed: " . $e->getMessage();
}
?>
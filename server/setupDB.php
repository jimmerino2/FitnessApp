<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Automatically create DB if not exist
$sql = "CREATE DATABASE IF NOT EXISTS fitnessapp";
$conn->query($sql);

// Select the database
$conn->select_db('fitnessapp');

// Create Tables by running SQL file
$sqlFile = 'server\tableSetup.sql';
$sql = file_get_contents($sqlFile);
if ($sql === false) {
    echo "<script>console.log('Error reading SQL files')</script>"; // Error
} else {
    if ($conn->multi_query($sql)) {  // Execute SQL
        do {
            // Store the result set
            if ($result = $conn->store_result()) {
                $result->free();
            }
            // Prepare for the next query
        } while ($conn->more_results() && $conn->next_result());
        echo "<script>console.log('SQL file executed successfully.');</script>";
    } else {
        echo "<script>console.log('Error executing SQL: " . $conn->error . "');</script>";
    }
}

$conn->close();

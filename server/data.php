<?php
include 'server\connectDB.php';

function getAllRecords($table)
{
    global $conn;
    $sql = 'SELECT * FROM $table';
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
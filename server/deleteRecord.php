<?php
include_once __DIR__ . '/../server/connectDB.php';
session_start();
$conn->select_db('fitnessapp');

// Delete Consultation
if (isset($_GET['consultationID'])) {
    $_SESSION['consultationID'] = $_GET['consultationID'];
}

if (isset($_SESSION['consultationID'])) {
    $sql = 'DELETE FROM Consultation WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_SESSION['consultationID']]);
    unset($_SESSION['consultationID']);
    header('Location: ../pages/record_consultation.php');
}
echo $_GET['consultationID'];
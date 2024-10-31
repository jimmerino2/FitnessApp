<?php
include_once __DIR__ . '/../server/connectDB.php';
session_start();
$conn->select_db('fitnessapp');

// Delete Consultation
if (isset($_GET['consultationID'])) {
    $_SESSION['consultationID'] = $_GET['consultationID'];
    
    if (isset($_SESSION['consultationID'])) {
        $sql = 'DELETE FROM Consultation WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_SESSION['consultationID']);
        $stmt->execute();
        unset($_SESSION['consultationID']);
        header('Location: ../pages/record_consultation.php');
        exit;
    }
}

// Delete Enrollment
if (isset($_GET['enrollmentID'])) {
    $_SESSION['enrollmentID'] = $_GET['enrollmentID'];
    
    if (isset($_SESSION['enrollmentID'])) {
        $sql = 'DELETE FROM Enrollment WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_SESSION['enrollmentID']);
        $stmt->execute();
        unset($_SESSION['enrollmentID']);
        header('Location: ../pages/record_enrollment.php');
        exit;
    }
}

// Delete Admin Consultation
if (isset($_GET['adminConsultationID'])) {
    $_SESSION['adminConsultationID'] = $_GET['adminConsultationID'];
    
    if (isset($_SESSION['adminConsultationID'])) {
        $sql = 'DELETE FROM Consultation WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $_SESSION['adminConsultationID']); // bind the parameter as integer
        $stmt->execute();  // execute without parameters
        unset($_SESSION['adminConsultationID']);
        header('Location: ../pages/admin.php');
        exit;
    }
}
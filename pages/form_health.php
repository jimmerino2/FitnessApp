<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body
    style="display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; flex-direction:column;">
    <form id='loginForm' name='loginForm' method='POST' style='border: 1px solid black; padding: 15px; width: 40rem;'>
        <div style='justify-items:center;'>
            <h2>Classes</h2>

            <?php
            include_once __DIR__ . '/../server/connectDB.php';
            include_once __DIR__ . '/../components/ConsultantItem.php';
            include_once __DIR__ . '/../layout/header.php';
            session_start();
            $conn->select_db('fitnessapp');

            $currentDate = date('Y-m-d');



            include_once __DIR__ . '/../components/FormItem.php';
            echo "
            <div class='form-item'>
                <h3 class='form-title'>Set Weight</h3>
                <input type='text' id='weight' name='weight' class='form-input' required>
            </div>
            
            <div class='form-item'>
                <h3 class='form-title'>Set Water Intake</h3>
                <input type='text' id='waterIntake' name='waterIntake' class='form-input' required>
            </div>

            <div class='form-item'>
                <h3 class='form-title'>Set Calories</h3>
                <input type='text' id='calories' name='calories' class='form-input' required>
            </div>
            ";

            include_once __DIR__ . '/../components/Buttons.php';
            renderSmallButton('classes.php', '', 'Back', 'button');
            renderSmallButton('', '', 'Submit', 'submit');

            ?>
        </div>
    </form>
</body>

</html>

<?php
// Data passage
include_once __DIR__ . '/../server/data.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $classID = $_POST['classID'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // memberID
    $sql = 'SELECT id FROM member WHERE email = ?';
    dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);

    $sql = 'INSERT INTO Enrollment (memberID, classID, startDate, endDate) VALUES (?, ?, ?, ?)';
    dataInsertSql($sql, $conn, [$memberID, $classID, $startDate, $endDate]);

    echo '<meta http-equiv="refresh" content="0;url=record_enrollment.php">';
    exit();
}
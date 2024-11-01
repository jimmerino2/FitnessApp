<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/forms.css">
    <title>Health Record</title>
</head>

<body>
    <div class="form_container">
        <form id='loginForm' name='loginForm' method='POST'>
            <div style='justify-items:center;'>
                <h2>Health Record</h2>

                <?php
                include_once __DIR__ . '/../server/connectDB.php';
                $conn->select_db('fitnessapp');

                include_once __DIR__ . '/../components/FormItem.php';
                renderFormItemTime('Set Time', 'time', '','','');
                renderFormItemCalendar('Set Date', 'date','','','');

                renderFormItemText('Set Weight(kg)', 'weight', 'Example: 60');
                renderFormItemText('Set Water Intake(ml)', 'water', 'Example: 3000');

<<<<<<< HEAD
                renderFormItemSelect('Set Exercise', 'exerciseID', ['2' => 'Cardio', '1' => 'Yoga', '3' => 'Weight Lifting', '4' => 'Pilates'], '');
=======
                renderFormItemSelect('Set Exercise', 'exerciseID', ['2' => 'Cardio', '1' => 'Yoga', '3' => 'Strength Training', '4' => 'Pilates']);
>>>>>>> 3d25a50cd73732e2ce8af89ed7b22739a5c5e518
                renderFormItemTime('Start Time', 'startTime','','','');
                renderFormItemTime('End Time', 'endTime','','','');

                include_once __DIR__ . '/../components/Buttons.php';
                renderSmallButton('record_health.php', '', 'Back', 'button', '#FF8080', 'black');
                renderSmallButton('', '', 'Submit', 'submit', '#1FAB89', 'black');
                ?>
            </div>
        </form>
    </div>
</body>

</html>

<?php
// Data passage
include_once __DIR__ . '/../server/data.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $time = $_POST['time'];
    $date = $_POST['date'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $water = $_POST['water'];
    $weight = $_POST['weight'];
    $exerciseID = $_POST['exerciseID'];

    // memberID
    $sql = 'SELECT id FROM member WHERE email = ?';
    dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);

    $sql = 'INSERT INTO HealthRecord (memberID, time, date, water, weight, startTime, endTime, exerciseID) VALUES (?, ?, ?, ?, ? ,? ,? ,?)';
    dataInsertSql($sql, $conn, [$memberID, $time, $date, $water, $weight, $startTime, $endTime, $exerciseID]);

    echo '<meta http-equiv="refresh" content="0;url=record_health.php">';
    exit();
}
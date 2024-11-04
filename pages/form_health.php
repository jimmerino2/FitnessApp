<?php
session_start();
?>

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
                echo "<h3 style='margin-top: 30px; text-decoration: underline;'>Required Section</h3>";
                renderFormItemText('Set Weight(kg)', 'weight', 'Example: 60', '');
                renderFormItemText('Set Water Intake(ml)', 'water', 'Example: 3000', '');

                echo "<h3 style='margin-top: 30px; text-decoration: underline;'>Optional Section</h3>";
                renderFormItemSelect('Set Exercise', 'exerciseID', ['3' => 'Cardio', '2' => 'Yoga', '4' => 'Weight Lifting', '5' => 'Pilates', '1' => 'None'], '1');
                renderFormItemTime('Start Time', 'startTime', '', '', '', false);
                renderFormItemNumber('Duration (min)', 'duration', false, '0', '300', $health['duration']);

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
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $currentDateTime = new DateTime();
    $currentDate = $currentDateTime->format('Y-m-d');
    $currentTime = $currentDateTime->format('H:i:s');

    $startTime = $_POST['startTime'];
    $duration = $_POST['duration'];
    $water = $_POST['water'];
    $weight = $_POST['weight'];
    $exerciseID = $_POST['exerciseID'];
    $endTime = '';

    // memberID
    $sql = 'SELECT id FROM member WHERE email = ?';
    dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);

    $sql = 'INSERT INTO HealthRecord (memberID, time, date, water, weight, startTime, duration, exerciseID) VALUES (?, ?, ?, ?, ? ,? ,? ,?)';
    dataInsertSql($sql, $conn, [$memberID, $currentTime, $currentDate, $water, $weight, $startTime, $duration, $exerciseID]);

    echo '<meta http-equiv="refresh" content="0;url=record_health.php">';
    exit();
}
?>
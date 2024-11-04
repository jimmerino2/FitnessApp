<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/forms.css">
    <title>Document</title>
</head>

<body>
    <div class="form_container">
        <form id='loginForm' name='loginForm' method='POST'>
            <div style='justify-items:center;'>
                <h2>Classes</h2>

                <?php
                session_start();
                include_once __DIR__ . '/../server/connectDB.php';
                include_once __DIR__ . '/../server/data.php';
                include_once __DIR__ . '/../components/ConsultantItem.php';
                $conn->select_db('fitnessapp');

                $currentDate = date('Y-m-d');
                $sql = 'SELECT * FROM Classes';
                $classes = dataGetResultSql($sql, $pdo, [], ['className', 'price', 'id']);
                $values = [];
                foreach ($classes as $class) {
                    $values[$class['id']] = $class['className'] . ' (RM' . $class['price'] . ')'; // Corrected format
                }


                include_once __DIR__ . '/../components/FormItem.php';
                renderFormItemRadio("Classes", "classID", $values);
                echo "
            <div class='form-item'>
                <h3 class='form-title'>Set Start Date</h3>
                <input type='date' id='startDate' name='startDate' min='$currentDate'class='form-input' required>
            </div>
            
            <div class='form-item'>
                <h3 class='form-title'>Set Number of Months (Max 5)</h3>
                <input type='number' name='noOfMonths' min='1' max='5' class='form-input' required>
            </div>
            ";

                include_once __DIR__ . '/../components/Buttons.php';
                renderSmallButton('classes.php', '', 'Back', 'button', '#FF8080', 'black');
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
    $classID = $_POST['classID'];
    $startDate = $_POST['startDate'];
    $noOfMonths = $_POST['noOfMonths'];

    // Set End Date
    $endDate = new DateTime($startDate);
    $endDate->modify('+' . $noOfMonths . ' months');
    $endDate = $endDate->format('Y-m-d');

    $sql = 'SELECT id FROM member WHERE email = ?';
    dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);

    // Insert into Enrollment table
    $sql = 'INSERT INTO Enrollment (memberID, classID, startDate, endDate) VALUES (?, ?, ?, ?)';
    dataInsertSql($sql, $conn, [$memberID, $classID, $startDate, $endDate]);

    echo '<meta http-equiv="refresh" content="0;url=record_enrollment.php">';
    exit();
}

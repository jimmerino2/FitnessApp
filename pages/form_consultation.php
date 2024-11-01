<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/forms.css">

<body>
    <div class="form_container">
        <form id='loginForm' name='loginForm' method='POST'>
            <div style='justify-items:center;'>
                <h2>Schedule Consultation</h2>

                <?php
                include_once __DIR__ . '/../server/connectDB.php';
                include_once __DIR__ . '/../components/ConsultantItem.php';
                include_once __DIR__ . '/../layout/header.php';
                $conn->select_db('fitnessapp');
                session_start();

                // Get the Consultant's details
                $_SESSION['consultantContact'] = $_GET['consultantContact'];
                $sql = 'SELECT * FROM Nutritionist WHERE nutritionistContact IN (?)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$_SESSION['consultantContact']]);
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Map data to array
                $nutritionist = [];
                foreach ($results as $row) {
                    $nutritionist[] = [
                        'id' => $row['id'],
                        'nutritionistName' => $row['nutritionistName'],
                        'studyRecord' => $row['studyRecord']
                    ];
                }
                renderNutritionistPreview('../asset/image/nutritionist' . $row['id'] . '.png', $row['nutritionistName'], $row['studyRecord']);

                include_once __DIR__ . '/../components/FormItem.php';
                renderFormItemCalendar('Set Date', 'consultationDate');
                renderFormItemTime('Set Time', 'consultationTime');
                renderFormItemTextarea('Add comment (optional)', 'comment', 'What would you like the nutritionist to know?');

                include_once __DIR__ . '/../components/Buttons.php';
                renderSmallButton('consultation.php', '', 'Back', 'button', '#FF8080', 'black');
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
    $date = $_POST['consultationDate'];
    $time = $_POST['consultationTime'];
    $comment = $_POST['comment'];
    $status = false;

    // memberID
    $sql = 'SELECT id FROM member WHERE email = ?';
    dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);

    // consultantID
    $sql = 'SELECT id FROM nutritionist WHERE nutritionistContact = ?';
    dataMapSql($sql, $conn, [$_SESSION['consultantContact']], $consultantID);

    $sql = 'INSERT INTO Consultation (memberID, nutritionistID, date, time, comment, status) VALUES (?, ?, ?, ?, ?, ?)';
    dataInsertSql($sql, $conn, [$memberID, $consultantID, $date, $time, $comment, $status]);

    echo '<meta http-equiv="refresh" content="0;url=record_consultation.php">';
    exit();
}
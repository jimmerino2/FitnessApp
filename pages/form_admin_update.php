<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/forms.css">

<body>
    <div class="form_container">
        <form id='loginForm' name='loginForm' method='POST'>
            <div style='justify-items:center;'>
                <h2>Consultation Record Update</h2>

                <?php
                include_once __DIR__ . '/../server/connectDB.php';
                include_once __DIR__ . '/../components/ConsultantItem.php';
                $conn->select_db('fitnessapp');
                session_start();

                $consultationId = $_GET['adminConsultationID'];

                $sql = 'SELECT c.*
                       FROM Consultation c 
                       WHERE c.id = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$consultationId]);
                $consultation = $stmt->fetch(PDO::FETCH_ASSOC);

                $_SESSION['consultation_id'] = $consultationId;
                $currentDate = date('Y-m-d');
                include_once __DIR__ . '/../components/FormItem.php';
                renderFormItemCalendar('Set Date', 'consultationDate',$currentDate, '');
                renderFormItemTime('Set Time', 'consultationTime','','');
                renderFormItemTextarea('Add comment (optional)', 'comment', 'What would you like the nutritionist to know?');

                include_once __DIR__ . '/../components/Buttons.php';
                renderSmallButton('admin.php', '', 'Back', 'button', '#FF8080', 'black');
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
    $consultantID = $_SESSION['consultation_id'];


    $sql = 'UPDATE Consultation SET date = ?, time = ? , comment = ?, status = ? WHERE id=? ';
    dataInsertSql($sql, $conn, [$date, $time, $comment, $status, $consultantID]);

    echo '<meta http-equiv="refresh" content="0;url=admin.php">';
    exit();
}

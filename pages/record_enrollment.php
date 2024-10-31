<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include_once __DIR__ . '/../server/connectDB.php';
        $conn->select_db('fitnessapp');
        include_once __DIR__ . '/../layout/header.php';
        include_once __DIR__ . '/../layout/footer.php';
        include_once __DIR__ . '/../components/Tables.php';
        renderHeader($conn);
        $sql = 'SELECT id FROM Member WHERE email = ?';
        dataMapSql($sql, $conn, [$_SESSION['userinput']], $memberID);
        $sql = 'SELECT E.ID AS enrollmentID, E.classID, C.className, E.startDate, E.endDate FROM Enrollment E INNER JOIN Classes C ON E.classID = C.ID WHERE memberID = ?';
        $enrollmentList = dataGetResultSql($sql, $pdo, [$memberID], ['enrollmentID', 'classID', 'className', 'startDate', 'endDate']);
        echo "<h2 style='text-align: center; font-size:48px;'>Enrollment Record</h2>";
        
        foreach ($enrollmentList as $enrollment) {
            renderTableConsultationUser($enrollment['enrollmentID'], '', ['Class Name' => $enrollment['className'], 'Start Date' => $enrollment['startDate'], 'End Date' => $enrollment['endDate']], '../server/deleteRecord.php?enrollmentID');
        }
        ?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="margin: 0px;">
    <?php
     include_once __DIR__ . '/../components/Buttons.php';
    include_once __DIR__ . '/../server/connectDB.php';
    include_once __DIR__ . '/../server/data.php';
    include_once __DIR__ . '/../components/Tables.php';
    $conn->select_db('fitnessapp');
    session_start(); 
    renderFixedButton('../server/logout.php', '../asset/image/logout.png');
    echo "<h2 style='text-align: center; font-size:48px;'>Admin Side Consultation Record</h2>";

    // Show all records that correspond to the user
    $sql = 'SELECT c.ID AS adminConsultationID, c.date, c.time, c.comment, c.status, c.nutritionistID, n.nutritionistName, n.nutritionistContact, c.memberID, m.memberName, m.email 
            FROM Consultation c
            JOIN Nutritionist n ON c.nutritionistID = n.ID
            JOIN Member m ON c.memberID = m.ID';
    $consultationList = dataGetResultSql($sql, $pdo, [], ['adminConsultationID','date', 'time','nutritionistID', 'nutritionistName', 'nutritionistContact','comment', 'status', 'memberID', 'memberName','email']);
    
    $groupedConsultations = [];
    foreach ($consultationList as $consultation) {
    $groupedConsultations[$consultation['memberID']]['memberName'] = $consultation['memberName'];
    $groupedConsultations[$consultation['memberID']]['consultations'][] = $consultation;
    }
    
    if (!empty($groupedConsultations)) {
        foreach ($groupedConsultations as $memberID => $memberData) {
            $memberName = $memberData['memberName'];
            $memberEmail = $memberData['consultations'][0]['email']; 
            echo "<h3 style='text-align:center; font-size:24px;'>Member: $memberName (ID: $memberID, Email: $memberEmail)</h3>";
    
            foreach ($memberData['consultations'] as $consultation) {
                $statusText = $consultation['status'] ? 'Approved' : 'Pending Approval';
            renderAdminTable($consultation['adminConsultationID'], '', [
                'Nutritionist Name' => $consultation['nutritionistName'],
                'Nutritionist Contact' => $consultation['nutritionistContact'],
                'Consultation Date' => $consultation['date'],
                'Consultation Time' => $consultation['time'],
                'Comment Written' => $consultation['comment'],
                'Status' => (!$consultation['status']) ? 'Pending Approval' : 'Approved'], '../server/deleteRecord.php?adminConsultationID');
        }
    }
    } else {
        echo 'no records lol';
    }

    ?>
</body>

</html>
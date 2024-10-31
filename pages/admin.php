<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <style>
        td{
            word-wrap: break-word;
        }
    </style>
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
    $nutritionistID = $consultation['nutritionistID'];
    
    // Set the nutritionist name only once
    if (!isset($groupedConsultations[$nutritionistID]['nutritionistName'])) {
        $groupedConsultations[$nutritionistID]['nutritionistName'] = $consultation['nutritionistName'];
    }
    
    // Add consultations to an array
    $groupedConsultations[$nutritionistID]['consultations'][] = $consultation;
}

if (!empty($groupedConsultations)) {
    foreach ($groupedConsultations as $nutritionistID => $nutritionistData) {
        $nutritionistName = $nutritionistData['nutritionistName'];
        echo "<h3 style='text-align:center; font-size:24px;'>Nutritionist: $nutritionistName (Nutritionist ID: $nutritionistID)</h3>";  
            
            // Create header row once
            echo "<div class='container_parent'><table>
                <tr>
                    <th>Member Name</th>
                    <th>Member Email</th>
                    <th>Nutritionist Contact</th>
                    <th>Consultation Date</th>
                    <th>Consultation Time</th>
                    <th>Comment Written</th>
                    <th>Status</th>
                    <th></th>
                </tr>";
            
            // Add all consultations for this member
            foreach ($nutritionistData['consultations'] as $consultation) {
                $statusText = (!$consultation['status']) ? 'Pending Approval' : 'Approved';
                echo "<tr>
                    <td>{$consultation['memberName']}</td>
                    <td>{$consultation['email']}</td>
                    <td>{$consultation['nutritionistContact']}</td>
                    <td>{$consultation['date']}</td>
                    <td>{$consultation['time']}</td>
                    <td>{$consultation['comment']}</td>
                    <td>$statusText</td>
                    <td>";
                renderSmallButton("../server/deleteRecord.php?adminConsultationID={$consultation['adminConsultationID']}", '', 'Remove Record', 'button');
                echo "</td>
                </tr>";
            }
            echo "</table></div>";
        }
    } else {
        echo 'no records lol';
    }

    ?>
</body>

</html>
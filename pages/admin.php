<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <style>
        td {
            word-wrap: break-word;
        }

        .fixedButton2 {
        position: fixed;
        bottom: 0px;
        right: 100px;
        padding: 20px;
        width: fit-content;
    }

    .roundedFixedBtn2 {
        display: flex;
        height: 60px;
        width: 60px;
        border-radius: 50%;
        padding: 5px;
        background-color: #C62E2E;
        color: white;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    
    </style>
</head>

<body style="margin: 0px;">
    <?php
    include_once __DIR__ . '/../components/Buttons.php';
    include_once __DIR__ . '/../server/connectDB.php';
    include_once __DIR__ . '/../server/data.php';
    include_once __DIR__ . '/../components/Tables.php';
    include_once __DIR__ . '/../components/SearchBar.php';
    $conn->select_db('fitnessapp');
    session_start();
    renderFixedButton('../server/logout.php', '../asset/image/logout.png');
    echo "
    <a class='fixedButton2' href='../pages/form_admin_add.php'>
        <div class='roundedFixedBtn2'><img src='../asset/image/record.png' style='width:80%;'></div>
     </a>";
    echo "<h2 style='text-align: center; font-size:48px;'>Admin Side Consultation Record</h2>";
    renderSearchBar('Search By Nutrition Name');

    $search = isset($_GET['search']) ? '%' . $_GET['search'] . '%' : '%';
    // Show all records that correspond to the user
    $sql = 'SELECT c.ID AS adminConsultationID, c.date, c.time, c.comment, c.status, c.nutritionistID, n.nutritionistName, n.nutritionistContact, c.memberID, m.memberName, m.email 
            FROM Consultation c
            JOIN Nutritionist n ON c.nutritionistID = n.ID
            JOIN Member m ON c.memberID = m.ID
            WHERE n.nutritionistName LIKE :search';
    $consultationList = dataGetResultSql($sql, $pdo, ['search' => $search], ['adminConsultationID', 'date', 'time', 'nutritionistID', 'nutritionistName', 'nutritionistContact', 'comment', 'status', 'memberID', 'memberName', 'email']);

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
                    <th>X</th>
                    <th>+</th>
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
                renderSmallButton("../server/deleteRecord.php?adminConsultationID={$consultation['adminConsultationID']}", '', 'Remove Record', 'button', '#FF8080', 'black');
                echo "</td>
                <td>";
                renderSmallButton("../pages/form_admin_update.php?adminConsultationID={$consultation['adminConsultationID']}", '', 'Update Record', 'button', '#FF8080', 'black');
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
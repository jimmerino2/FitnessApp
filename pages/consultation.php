<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container_content {
            display: flex;
            width: 100%;
            flex-direction: column;
            align-items: center;
        }

        .container_nutritionists {
            width: 80%;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../layout/title.php';
    include_once __DIR__ . '/../layout/footer.php';
    include_once __DIR__ . '/../components/ConsultantItem.php';
    include_once __DIR__ . '/../components/Buttons.php';
    include_once __DIR__ . '/../server/connectDB.php';
    include_once __DIR__ . '/../server/data.php';
    $conn->select_db('fitnessapp');
    renderHeader($conn);
    if (isset($_SESSION['userinput'])) { // Logged in 
        renderFixedButton('../pages/record_consultation.php', '../asset/image/record.png');
    }
    ?>

    <div class="container_content">

        <!-- Nutritionists Section -->
        <?php
        renderTitle('Meet our Nutritionists', 'Request to meet our nutritionists for a consultation and learn more about your health and wellbeing!', '../asset/image/consultation_header.png', '');
        // Selecting all nutritionists
        $sql = 'SELECT * FROM Nutritionist';
        $nutritionists = dataGetResultSql($sql, $pdo, [], ['nutritionistName', 'nutritionistDesc', 'nutritionistContact', 'studyRecord', 'nutritonistDesc']);
        ?>
        <div class='container_nutritionists'>
            <?php
            // Showing nutritionists on page
            $total = 1;
            foreach ($nutritionists as $nutritionist) {
                renderNutritionistDropdownBox('../asset/image/nutritionist' . $total . '.png', $nutritionist['nutritionistName'], $nutritionist['studyRecord'], $nutritionist['nutritionistContact'], $nutritionist['nutritonistDesc'], 'button' . $total, 'popup1' . $total);
                $total++;
            }
            ?>
        </div>
    </div>
    <?php
    renderFooter()
        ?>

</body>

</html>
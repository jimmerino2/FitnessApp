<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .home_nutritionist {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }
    </style>
</head>

<body style="margin:0px;">
    <?php
    session_start();
    include_once __DIR__ . '/../server/connectDB.php';
    include_once __DIR__ . '/../server/data.php';
    $conn->select_db('fitnessapp');
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../layout/footer.php';
    include_once __DIR__ . '/../layout/title.php';
    include_once __DIR__ . '/../components/Buttons.php';
    include_once __DIR__ . '/../components/ClassBox.php';
    include_once __DIR__ . '/../layout/footer.php';
    renderHeader($conn);
    renderTitle('Huan Fitness', 'Nurture a healthier life and build your future', '../asset/image/HomepageTitle.jpeg', ''); ?>

    <div class="home_nutritionist">
        <h1>Make an Appointment</h1>
        <?php
        $sql = 'SELECT * FROM nutritionist';
        $consultants = dataGetResultSql($sql, $pdo, [], ['id', 'nutritionistName', 'studyRecord']);
        foreach ($consultants as $consultant) {
            renderNutBox('../asset/image/nutritionist' . $consultant['id'] . '.png', $consultant['nutritionistName'], 'Hi, I have a ' . $consultant['studyRecord'] . '. I would be happy to help you examine your health!.');
        }
        ?>
    </div>

    <?php renderFooter(); ?>
</body>

</html>
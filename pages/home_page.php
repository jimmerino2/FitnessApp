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
            background-color: #B9E5E8;
            border-radius: 3.5%;
            padding: 40px;
            margin: 40px;
        }

        .home_about {
            background-color: #4A628A;
            border-radius: 3.5%;
            padding: 40px;
            margin: 40px;
            display: flex;
        }

        .home_about_content {
            background-color: #B9E5E8;
            margin-left: 40px;
            width: 100%;
            border-radius: 2.5%;
            padding-left: 40px;
            padding-right: 40px;
            font-size: 140%;
        }

        .button_absolute {
            position: absolute;
            bottom: -2.5%;
            right: 5%;
        }

        .home_content {
            background-color: #4A628A;
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
        }

        .home_class,
        .home_health {
            background-color: #B9E5E8;
            margin: 40px;
            padding: 20px;
            width: 45%;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 120%;
            text-align: center;
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
    renderHeader($conn);
    renderTitle('Huan Fitness', 'Nurture a healthier life and build your future', '../asset/image/HomepageTitle.jpeg', ''); ?>

    <div class="home_about">
        <img src="../asset/image/aboutHomepage.jpg" style="width: 350px; height: 350px; border-radius: 5%;">
        <div class="home_about_content">
            <h1>Who Are We</h1>
            <p>Huan Fitness is a fitness centre which allows customers to sign up to a variety of services such as
                physical training and dietary consultation!</p>
            <p>We aim to help people build up their wellbeing and achieve their fitness goals.</p>
            <div class="button_absolute">
                <?php renderBigButton('../pages/about.php', '', 'Learn more', 'button', '#7AB2D3') ?>
            </div>
        </div>
    </div>
    <div class="home_nutritionist">
        <h1>Make an Appointment</h1>
        <?php
        $sql = 'SELECT * FROM nutritionist';
        $consultants = dataGetResultSql($sql, $pdo, [], ['id', 'nutritionistName', 'studyRecord']);
        foreach ($consultants as $consultant) {
            renderNutBox('../asset/image/nutritionist' . $consultant['id'] . '.png', $consultant['nutritionistName'], 'Hi, I have a ' . $consultant['studyRecord'] . '. I would be happy to help you examine your health!');
        }
        ?>
    </div>

    <div class="home_content">
        <div class="home_class">
            <h2>Sign Up for Our Classes</h2>
            <p>Browse through our featured fitness classes to boost your stamina, lose weight, gain muscle or any other
                body goals you may be looking for!</p>
            <div style="display: flex; justify-content: space-between; width: 70%;">
                <img src="../asset/image/Cardio Blast.jpg" style="width: 250px; height: 250px; border-radius: 2.5%;">
                <img src="../asset/image/Advanced Pilates.jpg"
                    style="width: 250px; height: 250px; border-radius: 2.5%;">
            </div>
            <?php renderBigButton('../pages/classes.php', '', 'Browse Classes', 'button', '#7AB2D3') ?>
        </div>

        <div class="home_health">
            <h2>Keep Track of Your Health</h2>
            <p>Write down your daily health records here and have an easier experience monitoring changes in your body
                and health!</p>
            <img src="../asset/image/record_health.png" style="height: 250px; border-radius: 2.5%;">
            <?php
            if (isset($_SESSION['userinput']) && $_SESSION['userinput']) { // Logged in
                renderBigButton('../pages/record_health.php', '', 'Start Recording', 'button', '#7AB2D3');
            } else {
                renderBigButton('../pages/form_login.php', '', 'Browse Classes', 'button', '#7AB2D3');
            }
            ?>
        </div>
    </div>

    <?php renderFooter(); ?>
</body>

</html>
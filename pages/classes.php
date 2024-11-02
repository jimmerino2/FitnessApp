<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .classes_content {
            display: flex;
            width: 100;
        }

        .classes_nav {
            display: flex;
            flex-direction: column;
            min-height: 100%;
            background-color: #4A628A;
            width: 20%;
        }

        .classes_nav_content {
            width: 100%;
            position: sticky;
            top: 169px;
            z-index: 5;
            display: flex;
            flex-direction: column;
        }

        .classes_details {
            height: fit-content;
            display: flex;
            width: 100%;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include_once __DIR__ . '/../server/connectDB.php';
    include_once __DIR__ . '/../server/data.php';
    $conn->select_db('fitnessapp');
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../components/ClassBox.php';
    include_once __DIR__ . '/../layout/footer.php';
    include_once __DIR__ . '/../layout/title.php';
    renderHeader($conn);
    if (isset($_SESSION['userinput'])) { // Logged in 
        renderFixedButton('../pages/record_enrollment.php', '../asset/image/record.png');
    } else { // Not Logged in
    
    }
    ?>

    <?php renderTitle('Sign Up for Classes', 'Enter a class to further improve your health and promote a healthier lifestyle!', '../asset/image/classTitleImg.jpg', '') ?>

    <div class="classes_content">
        <div class='classes_nav'>
            <div class="classes_nav_content">
                <?php
                $sql = 'SELECT * FROM Classes';
                $classes = dataGetResultSql($sql, $pdo, [], ['className', 'classDesc', 'price']);
                foreach ($classes as $class) {
                    renderClassBox($class['className'], '', 'RM' . $class['price'], '#7AB2D3', 'B9E5E8', 'black', $class['className']);
                }
                ?>
            </div>
        </div>
        <div class="classes_details">
            <?php
            foreach ($classes as $class) {
                renderClassDetails('../asset/image/' . $class['className'] . '.jpg', $class['className'], $class['classDesc'], 'RM' . $class['price']);
            }
            ?>
        </div>
    </div>

    <?php renderFooter() ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
</head>
<body>
    <header style = "display:flex; padding: 5px">
        <img src = "fitness.png" height = "70px" width = "70px">
        <h1 style = "color:#185c28; padding-left: 10px">Huan Fitness</h1>
        <a style = "margin-left: auto; padding-top: 10px" href = "../pages/login_jim.php"><img src = "user.png" height = "50px" width = "50px"></a>
    </header>

    <nav>
        <ul style = "display: flex; list-style-type: none; margin: 0px; padding: 5px; overflow: hidden; background-color: #d6ffe0;">
            <li><a style = "display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000;" href = "../pages/home_page.php">HOME</a></li>
            <li><a style = "display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000" href = "../pages/consultation_page.php">CONSULTATION</a></li>
            <li><a style = "display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000" href = "../pages/classes_page.php">CLASSES</a></li>
            <li>
                <?php
                session_start();
                if(isset($_SESSION['userinput'])): ?>
                    <a style = "display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000" href = "../pages/healthrec_page.php">HEALTH RECORD</a>
                <?php else: ?>
                    <a style = "display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000" href = "../pages/login_jim.php">HEALTH RECORD</a>
                <?php endif; ?>
            </li>
            <li style = "margin-left: auto"><a style = "display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000" href = "../pages/about_page.php">ABOUT US</a></li>
        </ul>
    </nav>
</body>
</html>
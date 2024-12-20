<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">
</head>

<style>
    .header-container {
        width: 100%;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .header {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: white;
        height: 80px;
    }

    .logo {
        height: 70px;
        width: 70px;
    }

    .header-title {
        padding-left: 10px;
        display: flex;
        align-items: center;
    }

    .profile-section {
        margin: auto 0 auto auto;
        display: flex;
        align-items: center;
    }

    .username {
        margin: 0 15px;
        font-size: 24px;
    }

    .logout-icon,
    .login-icon {
        height: 50px;
        width: 50px;
    }

    .login-icon-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .nav-menu {
        background-color: #7AB2D3;
    }

    .nav-menu ul {
        display: flex;
        list-style-type: none;
        margin: 0;
        padding: 10px;
        overflow: hidden;
    }

    .nav-link {
        display: flex;
        margin: 14px 16px;
        text-decoration: none;
        text-align: center;
        color: #000000;
    }

    .about-us {
        margin-left: auto;
    }
</style>

<body>
    <?php
    // I need to include the css file here
    
    function renderHeader($conn)
    {
        include_once __DIR__ . '/../server/data.php';
        // Start session only if not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        echo "
    <div class='header-container'>
        <header class='header'>
            <img src='../asset/image/fitness.png' class='logo'>
            <h1 class='header-title'>Huan Fitness</h1>
            <div class='profile-section'>";

        // Profile section
        if (isset($_SESSION['userinput']) && $_SESSION['userinput']) { // Logged in
            // User
            $sql = 'SELECT memberName FROM member WHERE email IN (?)';
            dataMapSql($sql, $conn, [$_SESSION['userinput']], $username);
            echo "<span class='username'>$username</span>";
            echo "<a href='../server/logout.php'><img src='../asset/image/logout.png' class='logout-icon'></a>";
        } else {
            // Guest
            echo "<span class='username'>Guest</span>";
            echo "<div class='login-icon-container'>
                <a href='../pages/form_login.php'><img src='../asset/image/user.png' class='login-icon'></a>
              </div>";
        }

        echo "
            </div>
        </header>

        <nav class='nav-menu'>
            <ul>
                <li><a class='nav-link' href='../pages/home_page.php'>HOME</a></li>
                <li><a class='nav-link' href='../pages/consultation.php'>CONSULTATION</a></li>
                <li><a class='nav-link' href='../pages/classes.php'>CLASSES</a></li>";

        // Check if user is logged in to display HealthRecord link
        if (isset($_SESSION['userinput'])) { // Logged in 
            echo "<li><a class='nav-link' href='../pages/record_health.php'>HEALTH RECORD</a></li>";
        } else { // Not Logged in
            echo "<li><a class='nav-link' href='../pages/form_login.php'>HEALTH RECORD</a></li>";
        }

        echo "
                <li class='about-us'><a class='nav-link' href='../pages/about.php'>ABOUT US</a></li>
            </ul>
        </nav>
    </div>";
    }
    ?>
</body>

</html>
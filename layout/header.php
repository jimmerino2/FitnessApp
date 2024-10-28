<?php
function renderHeader($conn)
{
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
        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param('s', $_SESSION['userinput']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($username);
        $stmt->fetch();
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
        echo "<li><a class='nav-link' href='../pages/health_record.php'>HEALTH RECORD</a></li>";
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

<style>
    .header-container {
        width: 100%;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .header {
        display: flex;
        padding: 10px;
        background-color: white;
    }

    .logo {
        height: 70px;
        width: 70px;
    }

    .header-title {
        color: #185c28;
        padding-left: 10px;
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
        background-color: #d6ffe0;
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
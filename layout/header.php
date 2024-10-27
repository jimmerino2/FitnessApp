<?php
function renderHeader($conn)
{
    include_once __DIR__ . '/../components/Buttons.php';
    // Start session only if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    echo "
    <div style='width: 100%; position: sticky; top: 0; z-index: 10;'>
    <header style='display:flex; padding: 10px; background-color: white;'>
        <img src='../asset/image/fitness.png' height='70px' width='70px'>
        <h1 style='color:#185c28; padding-left: 10px'>Huan Fitness</h1>";
    echo "<div style='margin:auto 0px auto auto; display:flex; align-items:center;'>";

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
        echo "<span style='margin:0px 15px; font-size: 24px;'>$username</span>";
        renderSmallButton('../pages/logout.php', '', 'Log Out', 'button');
        echo "</div>";
    } else {
        // Guest
        echo "<span style='margin:0px 15px; font-size: 24px;'>Guest</span>";
        echo "<div style='display:flex; flex-direction:column; align-items:center;'>
                <a href='../pages/form_login.php'><img src='../asset/image/user.png' height='50px' width='50px'></a>";
        echo "</div></div>";
    }

    echo "</header>

    <nav>
        <ul
            style='display: flex; list-style-type: none; margin: 0px; padding: 10px; overflow: hidden; background-color: #d6ffe0;'>
            <li><a style='display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000;'
                href='../pages/home_page.php'>HOME</a></li>
            <li><a style='display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000'
                href='../pages/consultation_page.php'>CONSULTATION</a></li>
            <li><a style='display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000'
                href='../pages/classes_page.php'>CLASSES</a></li>
    ";

    // Check if user is logged in to display HealthRecord link
    if (isset($_SESSION['userinput'])) { // Logged in 
        echo "<li><a style='display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000'
                href='../pages/healthrec_page.php'>HEALTH RECORD</a>
            </li>";
    } else { // Not Logged in
        echo "<li><a style='display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000'
                href='../pages/form_login.php'>HEALTH RECORD</a>
            </li>";
    }

    echo "<li style='margin-left: auto'><a style='display: flex; margin: 14px 16px; text-decoration: none; text-align: center; color: #000000'
                href='../pages/about_page.php'>ABOUT US</a>
            </li>
        </ul>
    </nav>
    </div>";
}
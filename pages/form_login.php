<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/css/style.css">
    <link rel="stylesheet" href="../asset/css/forms.css">
</head>

<body>
    <div class="form_container">
        <form id='loginForm' name='loginForm' method='POST'>
            <div style='justify-items:center;'>
                <h2>Login Form</h2>

                <?php
                include_once __DIR__ . '/../components/FormItem.php';
                renderFormItemEmail("Email Address", "email", "xxx@gmail.com");
                renderFormItemPassword("Password", "pass", "Enter Password");
                ?>
                <div style='width:70%; margin:2.5px 0px;'>
                    <a href='form_forgot_pw.php'>Forgot Password</a>
                </div>
                <div style='width:70%'>
                    <a href='form_register.php'>Create an Account</a>
                </div><br>

                <?php
                include_once __DIR__ . '/../components/Buttons.php';
                renderSmallButton('home_page.php', '', 'Back', 'button', '#FF8080', 'black');
                renderSmallButton('', '', 'Login', 'submit', '#1FAB89', 'black');
                ?>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include_once __DIR__ . '/../server/connectDB.php';
$conn->select_db('fitnessapp');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Check if the email and password combination exists
    $sql = "SELECT memberPassword FROM member WHERE email = ?";
    $stmt_check = mysqli_prepare($conn, $sql);
    $stmt_check->bind_param('s', $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        $stmt_check->bind_result($hashed_password);
        $stmt_check->fetch();

        if (password_verify($pass, $hashed_password)) {
            $_SESSION['userinput'] = $email;
            if ($email === 'admin@gmail.com') {
                header("Location: admin.php");
            } else {
                header("Location:home_page.php");
            }
        } else {
            echo "<script>alert('Invalid username or password.')</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password.')</script>";
    }
}
?>
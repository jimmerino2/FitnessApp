<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body
    style="display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; flex-direction:column;">
    <form id='loginForm' name='loginForm' method='POST' style='border: 1px solid black; padding: 15px; width: 40rem;'>
        <div style='justify-items:center;'>
            <h2>Login Form</h2>

            <?php
            include_once __DIR__ . '/../components/FormItem.php';
            renderFormItemEmail("Email Address", "email", "xxx@gmail.com");
            renderFormItemPassword("Password", "pass", "Enter Password");
            ?>
            <div style='width:70%; margin:2.5px 0px;'>
                <a href='form_forgot_pw.php' style='text-decoration:none; color:blue;'>Forgot Password</a>
            </div>
            <div style='width:70%'>
                <a href='form_register.php' style='text-decoration:none; color:blue;'>Create an Account</a>
            </div><br>

            <?php
            include_once __DIR__ . '/../components/Buttons.php';
            renderSmallButton('home_page.php', '', 'Back', 'button');
            renderSmallButton('', '', 'Login', 'submit');
            ?>
        </div>
    </form>
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
            } else{
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
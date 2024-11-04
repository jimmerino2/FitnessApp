<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        .tablebg {
            width: 100%;
            position: relative;
            overflow: hidden;
        }

        .tablebg::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            height: 75%;
            background-color: #7AB2D3;
            z-index: -1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            position: relative;
            margin-bottom: 0px;
        }

        #owner {
            margin-left: 60px;
        }

        #goals td {
            text-align: right;
        }

        #owner td {
            text-align: left;
        }

        th {
            width: 45%;
            position: relative;
            font-size: 26px;
            background-color: transparent;
        }

        #goals th {
            text-align: left;
            vertical-align: bottom;
        }

        #owner th {
            text-align: right;
            vertical-align: top;
            top: 35px;
        }

        th,
        td {
            padding: 30px;
            position: relative;
        }

        .content {
            display: inline-block;
            padding: 10px 8px;
            background-color: #B9E5E8;
            font-size: 18px;
            margin-bottom: 40px;
        }

        .slideshow {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            width: fit-content;
            padding: 40px;
            margin: auto;
        }

        .slideimg {
            display: none;
            text-align: center;
            position: relative;
        }

        .slideimg img {
            width: 700px;
            height: auto;
        }

        .caption {
            position: absolute;
            bottom: 0px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 24px;
            color: white;
            background: #4A628A;
            padding: 10px;
            width: 120%;
            align-items: center;
        }

        .w3-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #4A628A;
            color: white;
            border: none;
            font-size: 24px;
            padding: 8px;
            cursor: pointer;
        }

        .w3-display-left {
            left: 0px;
        }

        .w3-display-right {
            right: 0px;
        }

        .info {
            display: flex;
            width: 100%;
            justify-content: space-around;
            align-items: center;
            text-align: center;
            background-color: #B9E5E8;
            padding: 20px;
            margin-bottom: 40px;
        }

        .home_header {
            width: 100%;
            display: flex;
            justify-content: center;
            background-color: #4A628A;
            margin-top: 40px;
            margin-bottom: 40px;
        }
    </style>
</head>

<body style="margin: 0px;">
    <?php
    session_start();
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../layout/title.php';
    include_once __DIR__ . '/../layout/footer.php';
    include_once __DIR__ . '/../server/connectDB.php';
    $conn->select_db('fitnessapp');
    renderHeader($conn);

    renderTitle('About Us', 'Learn more about our company and our vision and mission', '../asset/image/HomepageTitle.jpeg', '');
    ?>

    <div class="tablebg">
        <table id="goals">
            <tr>
                <td><img src="../asset/image/fitness1.png" height="300px" width="500px"></td>
                <th>Our Vision and Mission<br><br>
                    <div class="content">
                        Bringing you a healthier life for a beautiful and fruitful future<br>
                    </div>
                </th>
            </tr>
        </table>

        <table id="owner">
            <tr>
                <th>Chen Huan,<br>Owner of Huan Fitness
                    <br><br>
                    <div class="content">
                        Driven and passionate to help people meet their health and body goals<br><br>
                        "Fitness and proper diets are the key to success."
                    </div>
                </th>
                <td><img src="../asset/image/chenhuan.png"></td>
            </tr>
        </table>
    </div>

    <div class="home_header">
        <h1>Member's Review</h1>
    </div>

    <div class="slideshow">
        <div class="slideimg">
            <img src="../asset/image/member1.jpg">
            <div class="caption">"The best decision I've made for my health and well-being."</div>
        </div>
        <div class="slideimg">
            <img src="../asset/image/member4.jpg">
            <div class="caption">"It helps transformed my health journey—couldn't be happier!"</div>
        </div>
        <div class="slideimg">
            <img src="../asset/image/member2.jpg">
            <div class="caption">"I've never felt more motivated to reach my fitness goals."</div>
        </div>
        <div class="slideimg">
            <img src="../asset/image/member3.jpg">
            <div class="caption">"I feel confident and stronger than ever."</div>
        </div>

        <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>

    <div class="info">
        <div style="display: flex; flex-direction:column; align-items:center;">
            <h2>Want to know more about us?</h2>
            <h2>VISIT us at:</h2>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.8788100020483!2d101.72195697497105!3d3.1267292968487674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37bb455b4e61%3A0x7eebdcb9726d2ed2!2sSunway%20College%20%40%20Velocity!5e0!3m2!1sen!2smy!4v1730278439081!5m2!1sen!2smy"
                width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div style="display: flex; flex-direction:column; align-items:center;">
            <h2>EMAIL us at:</h2>
            <h3><a href="mailto:huanfitness@gmail.com" style="color: black;">huanfitness@gmail.com</a></h3>
            <img src="../asset/image/fitness.png" style="width: 350px; height: 350px;">
        </div>
    </div>

    <?php renderFooter(); ?>
    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        setInterval(function () { plusDivs(1); }, 5000);

        function plusDivs(n) {
            showDivs(slideIndex += n);
        }

        function showDivs(n) {
            var i;
            var x = document.querySelectorAll(".slideimg");
            if (n > x.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = x.length;
            }
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            x[slideIndex - 1].style.display = "block";
        }
    </script>

</body>

</html>
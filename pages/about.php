<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <style>
        .header{
            display: flex;
            justify-content: center;
            color: #1FAB89;
        }
        .tablebg{
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        .tablebg::before{
            content: '';
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 85%;
            height: 75%;
            background-color: #1FAB89;
            z-index: -1;
        }
        table{
            width: 100%;
            border-collapse: collapse;
            position: relative;
            margin-bottom: 0px;
        }
        td{
            width: 55%;
            background-color: transparent;
        }
        #goals td{
            text-align: right;
        }
        #owner td{
            text-align: left;
        }
        th{
            width: 45%;
            position: relative;
            font-size: 26px;
            background-color: transparent;
        }
        #goals th{
            text-align: left;
            vertical-align: bottom;
        }
        #owner th{
            text-align: right;
            vertical-align: top;
            top: 35px;
        }
        th, td{
            padding: 30px;
            position: relative;
        }
        .content{
            display: inline-block;
            padding: 10px 8px;
            background-color: #FF8080;
            font-size: 18px;
        }
        .slideshow{
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin: auto;
            width: 60%
        }
        .slideimg{
            display: none;
            text-align: center;
            position: relative;
        }
        .slideimg img{
            width: 90%;
            height: 350px;
        }
        .caption{
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            font-size: 18px;
            color: white;
            background: #1FAB89;
            padding: 4px;
            width: 60%;
            align-items: center;
        }
        .w3-button {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #1FAB89;
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
        .info{
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            color: #1FAB89;
        }
        .info hr{
            width: 85%;
            color: black;
            margin: 20px;
        }
    </style>
</head>

<body style="margin: 0px;">
    <?php
    include_once __DIR__ . '/../layout/header.php';
    include_once __DIR__ . '/../server/connectDB.php';
    $conn->select_db('fitnessapp');
    renderHeader($conn);
    ?>

    <div class = "header">
        <h1>About Us</h1>
    </div>

    <div class = "tablebg">
        <table id = "goals">
            <tr>
                <td><img src = "../asset/image/fitness1.png" height = "300px" width = "500px"></td>
                <th>Our mission:<br><br>
                <div class = "content">Bringing You to a Healthier Life<br>for Your Beautiful Future</div>
                </th>
            </tr>
        </table>

        <table id = "owner">
            <tr>
                <th>Chen Huan,<br>Owner of Huan Fitness
                <br><br>
                <div class = "content">Empowering Health and Wellness?</div>
                </th>
                <td><img src = "../asset/image/chenhuan.png"></td>
            </tr>
        </table>
    </div>
    
    <div class = "header">
        <h2>Member's Review</h2>
    </div>

    <div class = "slideshow">
        <div class = "slideimg">
            <img src = "../asset/image/member1.jpg">
            <div class = "caption">"The best decision I've made for my health and well-being."</div>
        </div>
        <div class = "slideimg">
            <img src = "../asset/image/member4.jpg">
            <div class = "caption">"It helps transformed my health journey—couldn't be happier!"</div>
        </div>
        <div class = "slideimg">
            <img src = "../asset/image/member2.jpg">
            <div class = "caption">"I've never felt more motivated to reach my fitness goals."</div>
        </div>
        <div class = "slideimg">
            <img src = "../asset/image/member3.jpg">
            <div class = "caption">"I feel confident and stronger than ever."</div>
        </div>

        <button class ="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class ="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>

    <div class = "info">
        <br>
        <hr>
        <h3>Want to know more about us?</h3>
        <h2>VISIT us at:</h2>
        <iframe src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.8788100020483!2d101.72195697497105!3d3.1267292968487674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37bb455b4e61%3A0x7eebdcb9726d2ed2!2sSunway%20College%20%40%20Velocity!5e0!3m2!1sen!2smy!4v1730278439081!5m2!1sen!2smy" 
            width ="400" height ="400" style ="border:0;" allowfullscreen ="" loading ="lazy" referrerpolicy ="no-referrer-when-downgrade">
        </iframe>
        <h2>or EMAIL us at:</h2>
        <h3><a href="mailto:huanfitness@gmail.com">huanfitness@gmail.com</a></h3>
    </div>

    <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        setInterval(function() { plusDivs(1); }, 5000);

        function plusDivs(n){
            showDivs(slideIndex += n);
        }

        function showDivs(n){
            var i;
            var x = document.querySelectorAll(".slideimg");
            if(n > x.length) {
                slideIndex = 1;
            }
            if(n < 1){
                slideIndex = x.length;
            }
            for(i = 0; i < x.length; i++){
                x[i].style.display = "none";
            }
            x[slideIndex-1].style.display = "block";
        }
    </script>

</body>

</html>
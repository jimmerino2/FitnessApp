<?php
include_once __DIR__ . '/Buttons.php';
include_once __DIR__ . '/../server/data.php';

function renderClassBox($text1, $text2, $text3, $bgColor, $buttonBg, $buttonTxt, $className)
{
    echo "
    <div class=\"class-box\" style='background-color: $bgColor'>
        <h2 class=\"class-box-title\">$text1</h2>
        <p class=\"class-box-description\">$text2</p>
        <p class=\"class-box-description\">$text3</p>";

    renderSmallButton('#' . $className, '', 'View Details', 'button', $buttonBg, $buttonTxt);
    echo "</div>";
}

function renderClassDetails($img, $title, $desc, $price)
{
    echo "
    <div id='$title' class='details_container'>
        <img src='$img'>
        <div class='details_desc'>
            <h1>$title</h1>
            <h2>$desc</h2>
            <h2>$price</h2>";
    renderSmallButton('../pages/form_enrollment.php', '', 'Enroll Now', 'button', '#7AB2D3', 'black');
    echo "
        </div>
    </div>
";
}

function renderNutBox($image, $name, $description)
{
    echo "
    <div class=\"nut-box\">
        <img src=\"$image\" class=\"nut-box-image\">
        <div class=\"nutriDesc\">
            <h2 class=\"nut-box-name\">$name</h2>
            <p class=\"nut-box-description\">$description</p>
        </div>
        <div class=\"button-container\">
            <!-- Add any buttons if needed -->
        </div>
    </div>";
    echo "
    <script> //Script for renderNutBox
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let slides = document.getElementsByClassName(\"nut-box\");

        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = \"none\";
        }

        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        slides[slideIndex - 1].style.display = \"flex\";

        setTimeout(showSlides, 3000);  //3 seconds
    }
    </script>
    ";
}
?>

<style>
    /* CSS for renderClassBox */
    .details_container {
        display: flex;
        background-color: #4A628A;
        margin: 30px;
        padding: 25px;
        width: 80%;
    }

    .div_absolute {
        display: flex;
        justify-content: right;
    }

    .details_container img {
        width: 300px;
        height: 300px;
        border-radius: 2.5%;
    }

    .details_desc {
        margin-left: 30px;
        background-color: #DFF2EB;
        border-radius: 2.5%;
        width: 70%;
        padding: 30px;
    }

    .class-box {
        flex: 1;
        border: none;
        border-radius: 2.5%;
        margin: 20px;
        text-align: center;
        padding: 15px;
    }

    .class-box-title {
        font-size: 20px;
    }

    .class-box-description {
        font-size: 15px;
    }

    /* CSS for renderNutBox */
    .nut-box {
        padding: 10px;
        border: 1px solid black;
        display: none;
        /* Hide all initially */
        justify-content: center;
        margin: 10px 300px;
        animation: fade 1s ease-in-out forwards;
    }

    .nut-box-image {
        border: 1px solid black;
        width: 25%;
        aspect-ratio: 1 / 1;
    }

    .nutriDesc {
        flex: 1;
        border: 1px solid black;
        margin: 10px;
    }

    .nut-box-name {
        font-size: 24px;
    }

    .nut-box-description {
        font-size: 16px;
    }

    .button-container {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>
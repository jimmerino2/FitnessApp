<?php
include_once __DIR__ . '/Buttons.php';
include_once __DIR__ . '/../server/data.php';

function renderClassBox($text1, $text2)
{
    echo "
    <div class=\"class-box\">
        <h1 class=\"class-box-title\">$text1</h1>
        <p class=\"class-box-description\">$text2</p>";
    
    if (isset($_SESSION['userinput'])) { // Logged in 
        renderMediumButton('../pages/form_enrollment.php', '', 'Class', '');
    } else { // Not Logged in
        renderMediumButton('../pages/form_login.php', '', 'Class', '');
    }
    echo "</div>";
}

function renderNutBox($image, $name, $description)
{
    echo "
    <div class=\"nut-box\">
        <img src=\"$image\" class=\"nut-box-image\">
        <div class=\"nutriDesc\">
            <h2 class=\"nut-box-name\">$name</h2>
            <p class=\"nut-box-description\">$description</p>
        </div>";
    echo "<div class=\"button-container\">";
    renderSmallButton('', '', 'Next', '');
    echo "</div></div>";
}
?>

<style>
    /* CSS for renderClassBox */
    .class-box {
        flex: 1;
        border: 2px solid black;
        background-color: lightgreen;
        max-width: 20%;
        margin: 20px;
        text-align: center;
    }

    .class-box-title {
        font-size: 30px;
    }

    .class-box-description {
        font-size: 20px;
    }

    /* CSS for renderNutBox */
    .nut-box {
        padding: 10px;
        border: 1px solid black;
        display: flex;
        justify-content: center;
        margin: 10px 300px;
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

</style>


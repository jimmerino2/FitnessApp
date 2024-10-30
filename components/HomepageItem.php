<?php
include_once 'Buttons.php';
include_once 'ClassBox.php';

function renderAdvertise()
{
    echo "
    <div class='advertise-container'>
        <img src='../asset/image/homeAdvertise.jpeg' class='advertise-image'>
        <div class='advertise-text'>
            <h1>Huan Fitness</h1>
            <p>xxxxxxxxxxx</p>";

    renderBigButton('', '', 'Know more About Us', '');

    echo "
        </div>
    </div>
    ";
}

function renderClassBoxFlex()
{
    echo "<div class='classbox-flex'>";
    renderClassBox('Class1', 'RM50');
    renderClassBox('Class2', 'RM100');
    echo "</div>";
}
?>

<style>
    .advertise-container {
        padding-top: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .advertise-image {
        max-width: 100%;
        height: 400px;
    }

    .advertise-text {
        flex: 1;
        max-width: 35%;
        height: 400px;
        padding: 0 60px;
        margin: 0;
        background-color: lightblue;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .advertise-text h1 {
        font-size: 70px;
        margin: 0;
    }

    .advertise-text p {
        font-size: 24px;
        margin-top: 10px;
    }

    .classbox-flex {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
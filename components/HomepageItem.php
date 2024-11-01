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


function renderSlideShow()
{
    renderNutBox('../asset/image/nutritionist1.png', 'Name', 'Hi im a nutritionist1');
    renderNutBox('../asset/image/nutritionist2.png', 'Name', 'Hi im a nutritionist2');
    renderNutBox('../asset/image/nutritionist3.png', 'Name', 'Hi im a nutritionist3');
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
        background-color: #4A628A;
    }
</style>
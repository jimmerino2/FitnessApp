<?php
include_once __DIR__ . '/../../components/Buttons.php';
include __DIR__ . '/../../components/ClassBox.php';

function renderAdvertise()
{
    echo "
    <div style=\"padding-top: 40px; display: flex; justify-content: center; align-items: center;\">
        <img src='../asset/image/homeAdvertise.jpeg' style =\"max-width:100%; height: 400px;\">
            <div style=\"flex: 1; max-width: 35%; height: 400px; padding-left: 60px; padding-right: 60px; margin: 0px; background-color: lightblue;\">
                <h1 style=\"font-size: 70px;\">Huan Fitness</h1>
                <p style=\"font-size: 24px\">xxxxxxxxxxx<p>";

    renderHomeBigButton('', '', 'Know more About Us', '');

    echo "
            </div>
    </div>
    ";
}

function renderClassBoxFlex()
{
    echo "
    <div style=\"display: flex; justify-content: center; align-items: center;\">
    ";
    renderClassBox('Class1', 'RM30');
    renderClassBox('Class2', 'RM50');
    echo "
    </div>
    ";
}
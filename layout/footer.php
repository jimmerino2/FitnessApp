<?php
function renderFooter()
{
    echo "
    <div style ='background-color:lightgrey; padding:15px 0px;'>
        <div class='bigContainer' style='display:flex; justify-content:space-around'>
            <div class='companyName'>
                <h2>About</h2>
                <p>Huan Fitness © All Rights Reserved 2024</p>
            </div>
            <div class='links'>
                <h2>Useful links</h2>
                <a href='' style ='text-decoration: none; color:black'>Help</a><br>
                <a href='' style ='text-decoration: none; color:black'>About us</a><br>
            </div>
            <div class='contact'>
                <h2>Contact</h2>
                +60 123 456 7890<br>
                huanfitness@gmail.com<br>
                Selangor, Taman Company, 4412<br>
            </div>
        </div>
    </div>
    ";
}
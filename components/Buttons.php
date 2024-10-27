<?php

function renderSmallButton($link, $function, $text, $inputType)
{
    echo "
    <a href=\"$link\" style=\"text-decoration: none;\">
        <button type=\"$inputType\" onclick=\"$function\"
            style=\"background-color:grey; border-color:black; padding:8px 15px; margin:5px;\">
            $text
        </button>
    </a>";
}

function renderHomeBigButton($link, $function, $text, $inputType)
{
    echo "
    <a href=\"$link\" style=\"text-decoration: none;\">
        <button type=\"$inputType\" onclick=\"$function\"
            style=\"background-color:grey; font-size: 28px; border: solid 0px black; border-radius: 20px; color: rgb(0, 0, 0);padding:20px 50px; margin:20px; 
            box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.2), 0 0 20px 0 rgba(0, 0, 0, 0.19);\">
            $text
        </button>
    </a>";
}

function renderHomeMediumButton($link, $function, $text, $inputType)
{
    echo "
    <a href=\"$link\" style=\"text-decoration: none;\">
        <button type=\"$inputType\" onclick=\"$function\"
            style=\"background-color:grey; font-size: 20px; border: solid 0px black; border-radius: 20px; color: rgb(0, 0, 0);padding:10px 30px; margin:20px; 
            box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.2), 0 0 20px 0 rgba(0, 0, 0, 0.19);\">
            $text
        </button>
    </a>";
}
<?php
function renderSmallButton($link, $function, $text, $inputType, $bgColor, $txtColor)
{
    echo "
    <a href=\"$link\" style=\"text-decoration: none;\">
        <button type=\"$inputType\" onclick=\"$function\" class=\"small-button\" style='background-color:$bgColor; color:$txtColor;'>
            $text
        </button>
    </a>";
}

function renderBigButton($link, $function, $text, $inputType, $bgColor)
{
    echo "
    <a href=\"$link\" style=\"text-decoration: none;\">
        <button type=\"$inputType\" onclick=\"$function\" class=\"big-button\" style='background-color:$bgColor; color: black;'>
            $text
        </button>
    </a>";
}

function renderFixedButton($link, $imageLink)
{
    echo "
    <a class='fixedButton' href='$link'>
        <div class='roundedFixedBtn'><img src='$imageLink' style='width:80%;'></div>
     </a>
    ";
}
?>
<style>
    .small-button {
        padding: 8px 24px;
        font-weight: bold;
        margin: 5px;
        cursor: pointer;
        border: none;
        border-radius: 15%;
        font-size: 13px;
    }

    .big-button {
        cursor: pointer;
        font-size: 28px;
        border: solid 0px black;
        border-radius: 20px;
        padding: 20px 50px;
        margin: 20px;
    }

    .medium-button {
        cursor: pointer;
        background-color: grey;
        font-size: 20px;
        border: solid 0px black;
        border-radius: 20px;
        color: rgb(0, 0, 0);
        padding: 10px 30px;
        margin: 20px;
        box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.2), 0 0 20px 0 rgba(0, 0, 0, 0.19);
    }

    .fixedButton {
        position: fixed;
        bottom: 0px;
        right: 0px;
        padding: 20px;
        width: fit-content;
    }

    .roundedFixedBtn {
        display: flex;
        height: 60px;
        width: 60px;
        border-radius: 50%;
        padding: 5px;
        background-color: #4CAF50;
        color: white;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
</style>
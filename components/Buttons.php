<?php
function renderSmallButton($link, $function, $text, $inputType)
{
    echo "
    <a href=\"$link\" style=\"text-decoration: none;\">
        <button type=\"$inputType\" onclick=\"$function\" class=\"small-button\">
            $text
        </button>
    </a>";
}

function renderBigButton($link, $function, $text, $inputType)
{
    echo "
    <a href=\"$link\" style=\"text-decoration: none;\">
        <button type=\"$inputType\" onclick=\"$function\" class=\"big-button\">
            $text
        </button>
    </a>";
}

function renderMediumButton($link, $function, $text, $inputType)
{
    echo "
    <a href=\"$link\" style=\"text-decoration: none;\">
        <button type=\"$inputType\" onclick=\"$function\" class=\"medium-button\">
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
        background-color: grey;
        border-color: black;
        padding: 8px 15px;
        margin: 5px;
        cursor: pointer;
    }

    .big-button {
        cursor: pointer;
        background-color: grey;
        font-size: 28px;
        border: solid 0px black;
        border-radius: 20px;
        color: rgb(0, 0, 0);
        padding: 20px 50px;
        margin: 20px;
        box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.2), 0 0 20px 0 rgba(0, 0, 0, 0.19);
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
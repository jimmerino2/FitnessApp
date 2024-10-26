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


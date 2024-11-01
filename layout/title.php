<?php
function renderTitle($title, $desc, $image)
{
    echo "
<div class='title' style='background: linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.7)), url($image);background-position: bottom;
        background-repeat: no-repeat;background-size: cover;'>
    <div class='title_text'>
        <h1>$title</h1>
        <h3>$desc</h3>
    </div>
</div>
";
}
?>

<style>
    .title_text {
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .title_text h3 {
        text-align: center;
    }

    .title {
        width: 100%;
        background-size: cover;
        margin-bottom: 60px;
        height: 350px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-size: 150%;
    }
</style>
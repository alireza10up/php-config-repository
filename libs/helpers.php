<?php

function diePage(string $msg = A_PROBLEM): string
{
    echo "<div style='width: 80%; color: #6e3030; padding: 1.2rem 1rem; margin: 1rem auto; background: #edbdbd; font-family: sans-serif; border-radius: 5px; border: solid #d1a7a7;'>{$msg}<br><a href= '" . BASE_URL . "'> صفحه اصلی <a></div>";
    die();
}

function dd(mixed $arg)
{
    echo '<pre style="background: #333; padding: 1rem; margin: 1rem; border-left: red solid 14px; color: white;">';
    var_dump($arg);
    echo '</pre>';
}

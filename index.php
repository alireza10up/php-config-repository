<?php
include "core" . DIRECTORY_SEPARATOR . "init.php";
include "module" . DIRECTORY_SEPARATOR . "header.php";
if (firstSetup()) {
    if (authentication()) {
        include "module" . DIRECTORY_SEPARATOR . "main.php";
        include "module" . DIRECTORY_SEPARATOR . "footer.php";
    } else {
        include "module" . DIRECTORY_SEPARATOR . "login.php";
    }
} else {
    include "module" . DIRECTORY_SEPARATOR . "firstSetup.php";
}
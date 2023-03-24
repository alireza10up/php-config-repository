<?php

# Author : alireza10up
# Team : 10up
# Date :  2022oct25

defined('BASE_PATH') || die('Access denali !');

if ($_POST) {

    $status = $_POST["status"] ?? diePage();

    echo match ($status) {
        'register' => beforeRegister(),
        'login' => beforeLogin(),
        'logout' => logout(),
        'addData' => beforeAddData(),
        'deleteData' => alert(deleteData($_POST['idData'] ?? null), 1),
        default => alert(INVALID_REQUEST),
    };
}
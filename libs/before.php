<?php

defined('BASE_PATH') || die('Access denali !');

function beforeRegister()
{
    # Data 
    $uname = htmlspecialchars($_POST["uname"] ?? '');
    $pass = htmlspecialchars($_POST["pass"] ?? '');
    $repass = htmlspecialchars($_POST["repass"] ?? '');
    $admin = htmlspecialchars($_POST["admin"] ?? '');

    # Process
    if (empty($uname) || empty($pass) || empty($repass)) return alert(EMPTY_FIELD);
    if ($pass != $repass) return alert(NOT_EQUAL_PASS);
    if (strlen($uname) > 16 || strlen($uname) < 5) return alert(LENGTH_USERNAME_ERR);
    if (strlen($pass) > 16 || strlen($pass) < 8) return alert(LENGTH_PASS_ERR);

    $admin = ($admin) ? 1 : 0;

    return alert(register($uname, $pass, $admin), 1);
}

function beforeLogin()
{
    # Data 
    $uname = htmlspecialchars($_POST["uname"] ?? '');
    $pass = htmlspecialchars($_POST["pass"] ?? '');

    # Process
    if (empty($uname) || empty($pass)) return alert(EMPTY_FIELD);
    if (strlen($uname) > 16 || strlen($uname) < 5) return alert(LENGTH_USERNAME_ERR);
    if (strlen($pass) > 16 || strlen($pass) < 8) return alert(LENGTH_PASS_ERR);
    return alert(login($uname, $pass), 1);
}

function beforeAddData()
{
    # Data
    $type = htmlspecialchars($_POST["type"] ?? NOTHING_TYPE);
    $des = htmlspecialchars($_POST["des"] ?? NOTHING_DES);
    $value = htmlspecialchars($_POST["value"] ?? EMPTY_VAL);
    $token = htmlspecialchars($_POST['token'] ?? '');
    $uname = $_COOKIE["userLogin"] ?? diePage();

    # Process
    if ($token !== $_SESSION['token'] ?? '') diePage(CSRF_ERR);
    if (empty($value) || empty($uname)) return alert(EMPTY_FIELD);

    return alert(addData($uname, $type, $des, $value), 1);
}

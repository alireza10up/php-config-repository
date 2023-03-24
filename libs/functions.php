<?php

# Author : alireza10up
# Team : 10up
# Date :  2022oct25

defined('BASE_PATH') || die('Access denali !');

function firstSetup()
{
    if (isset($_COOKIE['firstCheck'])) return 1;

    global $pdo;

    $query = 'SELECT * FROM `users` WHERE `role` = 1';

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result) {
        setcookie('firstCheck', true, time() + 1000 * 10000, '/');
        return true;
    }
    return false;
}

function authentication(bool $adminCheck = false): bool
{
    if ($adminCheck) return (isset($_COOKIE['admin'])) ? true : false;
    return (isset($_COOKIE["userLogin"])) ? true : false;
}

function url(string $path = null)
{
    return BASE_URL . $path;
}

function alert(string $alert = null, int $status = null)
{

    $color = ($status == 1) ? "warning" : "danger";

    return "<span id='alert' class='fixed-bottom alert alert-{$color}'>سیستم : {$alert}</span>";
}

function register(string $uname = null, string $pass = null, int $admin = null)
{
    global $pdo;

    $query = "SELECT * FROM `users` WHERE uname= ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$uname]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) return DUPLICATE_USER_NAME;

    $hash = password_hash($pass, PASSWORD_DEFAULT); //Encrypt Password
    $query = "INSERT INTO `users`(`uname` , `pass` , `role`) VALUES (?,?,?) ";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute([$uname, $hash, $admin])) {
        return REGISTER_SUCCESSFULLY;
    }
    return REGISTER_ERR;
}

function login(string $uname = null, string $pass = null)
{
    global $pdo;

    # Sanitize user input
    $uname = filter_var($uname, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pass = filter_var($pass, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `uname` = ?");
    $stmt->execute([$uname]);
    $data = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$data) return INVALID_LOGIN_DATA;

    # Use Encrypted Password Storage (bcrypt)
    if (!password_verify($pass, $data->pass)) return INVALID_LOGIN_DATA;

    $userId = $data->id;
    setcookie("userLogin", $uname, time() + 81000, "/");
    setcookie("userId", $userId, time() + 81000, "/");
    if ($data->role) setcookie("admin", "admin", time() + 81000, "/");

    return REDIRECT_SCRIPT;
}

function logout()
{
    if (isset($_COOKIE["userLogin"])) {
        setcookie("userLogin", "", time() - 3600, "/");
        setcookie("userId", "", time() - 3600, "/");
    }
    if (isset($_COOKIE["admin"])) setcookie("admin", "", time() - 3600, "/");
    return REDIRECT_SCRIPT_HOME;
}

function addData(string $uname = null, string $type = '', string $des = '', string $value = '')
{
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO `data`(`type`, `des`, `user`, `value`) VALUES (?, ?, ?, ?)");

    if ($stmt->execute([$type, $des, $uname, $value])) return REGISTER_SUCCESSFULLY;

    return A_PROBLEM;
}

function getData()
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM `data` ORDER BY `id` DESC");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
}

function deleteData(int $id = null)
{
    global $pdo;

    $query = "DELETE FROM `data` WHERE `id` = ?";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute([$id])) return DELETE_SUCCESSFULLY;

    return A_PROBLEM;
}

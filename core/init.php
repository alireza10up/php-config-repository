<?php

// ==== initial ====
define("BASE_URL", "http://localhost/configRepository/");
define("BASE_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define("FORM_PATH", $_SERVER["PHP_SELF"]);

$tokenInput = md5(session_id());
$_SESSION['token'] = $tokenInput;

// ==== Add Libs ====
include BASE_PATH . "core/constants.php";
include BASE_PATH . "core/config.php";

// ==== Setup DB ====
try {
    $dsn = "mysql:host={$configDB->host};dbname={$configDB->dbName}";
    $pdo = new PDO($dsn, $configDB->user, $configDB->pass);
} catch (PDOException $e) {
    diePage("Connection failed: " . $e->getMessage());
}

// ==== Continue Libs ====
include BASE_PATH . "libs" . DIRECTORY_SEPARATOR . "helpers.php";
include BASE_PATH . "libs" . DIRECTORY_SEPARATOR . "before.php";
include BASE_PATH . "libs" . DIRECTORY_SEPARATOR . "functions.php";
include BASE_PATH . "core" . DIRECTORY_SEPARATOR . "handler.php";

// ==== First Setup ====
firstSetup();

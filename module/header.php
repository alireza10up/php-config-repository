<?php defined('BASE_PATH') || die('Access denali !'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">

    <!-- === Style Custom === -->
    <link rel="stylesheet" href="<?= url("assets/css/style.css") ?>">

    <!-- === Bootstrap === -->
    <link rel="stylesheet" href="<?= url("assets/css/bootstrap.min.css") ?>">

    <!-- === Js Libs :) ===  -->
    <script src="<?= url('assets/js/clipboard.js') ?>"></script>

    <title><?= SITE_TITLE_EN ?></title>
</head>

<body dir="rtl">
    <?= isset($msg) ? $msg : '' ?>
    <header class="bg-dark bg-gradient">
        <nav class="d-flex p-3 justify-content-between align-items-center">
            <span onclick="window.location.href = '<?= BASE_URL ?>'" class="btn text-black bg-white p-2 rounded-2"><?= SITE_TITLE ?></span>
            <div class="d-flex">
                <?php if (isset($_COOKIE["userLogin"])) : ?>
                    <span class="btn btn-primary d-flex gap-2 align-items-center"><span><?= TXT_USER ?> </span><span><?= $_COOKIE["userLogin"]; ?></span>
                        <!-- === log Out Form === -->
                        <form action="<?= FORM_PATH ?>" class="d-flex " method="post">
                            <input type="hidden" name="status" value="logout">
                            <button type="submit" class="btn btn-danger "><?= TXT_EXIT ?></button>
                        </form>
                    </span>
                <?php endif; ?>
            </div>
        </nav>
    </header>
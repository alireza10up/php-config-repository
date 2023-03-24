<?php defined('BASE_PATH') || die('Access denali !'); ?>

<form class="form-add form-control shadow mt-5" action="<?= FORM_PATH ?>" method="post">

    <h4 class="text-center bg-dark text-white p-1 rounded">ورود</h4>

    <div class="mb-3">
        <label for="uname" class="form-label">نام کاربری</label>
        <input type="text" class="form-control" id="uname" name="uname">
    </div>
    <div class="mb-3">
        <label for="pass" class="form-label">رمز عبور</label>
        <input type="password" class="form-control" id="pass" name="pass">
    </div>
    <input type="hidden" name="status" value="login">
    <input type="submit" class="btn btn-primary form-control" name="request" value="پردازش">
</form>
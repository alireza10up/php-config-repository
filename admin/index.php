<?php
# ==== Initial ====
include dirname(__DIR__) . DIRECTORY_SEPARATOR . "core" . DIRECTORY_SEPARATOR . "init.php";

(authentication(true)) ? '' : diePage('به این منطقه نمیخوری');
?>

<form action="<?= FORM_PATH ?>" class="form-add form-control shadow mt-5" method="POST">
    <h4 class="text-center bg-dark text-white p-1 rounded">ثبت کاربر جدید</h4>

    <div class="mb-3">
        <label for="uname" class="form-label">نام کاربری</label>
        <input type="text" class="form-control" id="uname" name="uname">
    </div>
    <div class="mb-3">
        <label for="pass" class="form-label">رمز عبور</label>
        <input type="password" class="form-control" id="pass" name="pass">
    </div>
    <div class="mb-3">
        <label for="repass" class="form-label">تکرار رمز</label>
        <input type="password" class="form-control" id="repass" name="repass">
    </div>
    <div class="mb-3">
        <label for="admin" class="form-label">کاربر ادمین</label>
        <input type="checkbox" name="admin" id="admin">
    </div>
    <input type="hidden" name="status" value="register">
    <input type="submit" class="btn btn-primary form-control" name="request" value="پردازش">
</form>
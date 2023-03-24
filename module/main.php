<?php defined('BASE_PATH') || die('Access denali !'); ?>

<main>

    <div>
        <form action="<?= FORM_PATH ?>" method="POST" class="form-control p-3 list-group gap-3 form-add">

            <h4 class="text-white p-1 rounded-3 bg-dark text-center"><?= TXT_ADD ?></h4>

            <input type="text" name="type" class="form-control" placeholder="نوع کانفیگ (الزامی نیست)">
            <input type="text" name="des" class="form-control" placeholder="توضیحات (الزامی نیست)">
            <input type="text" name="value" class="form-control" placeholder="محتوا (الزامی)" require>
            <input type="hidden" name="status" value="addData" />
            <input type="hidden" name="token" value="<?= $tokenInput ?>" />
            <input type="submit" class="btn btn-primary" value="ارسال">
        </form>
    </div>

    <h2 class="bg-primary bg-gradient p-3 m-3 rounded text-white"><?= TXT_REPOSITORY_LIST ?></h2>

    <div class="m-3 d-flex flex-wrap gap-3 justify-content-center">

        <?php
        # ==== Print Data ==== #
        $result = getData();
        foreach ($result as $item) :
        ?>
            <ul class="list-group bg-white p-0 shadow mb-3 " style="width: 300px ;height:fit-content ;">
                <li class="list-group-item list-group-item-secondary">
                    <span class="btn btn-primary"><?= TXT_USER ?></span> <span><?= $item->user ?></span>
                </li>
                <li class="list-group-item">
                    <span class="btn btn-primary"><?= TXT_TYPE ?></span> <span><?= $item->type ?></span>
                </li>
                <li class="list-group-item list-group-item-secondary">
                    <span class="btn btn-primary"><?= TXT_DES ?></span> <span><?= $item->des ?></span>
                </li>
                <li class="list-group-item ">
                    <input type="text" class="form-control" value="<?= $item->value ?>" id="clipboard-input" readonly disabled />
                </li>
                <li class="list-group-item list-group-item-secondary d-flex justify-content-between">
                    <button data-clipboard-text="<?= $item->value ?>" class="copy-btns btn w-75 btn-warning"><?= TXT_COPY ?></button>
                    <?php if (isset($_COOKIE["admin"]) || $_COOKIE["userLogin"] == $item->user) : ?>
                        <form action="<?= FORM_PATH ?>" method="POST">
                            <input type="hidden" name="status" value="deleteData">
                            <button class="btn btn-danger" name="idData" value="<?= $item->id ?>"><?= TXT_DELETE ?></button>
                        </form>
                </li>
            <?php endif; ?>
            </ul>
        <?php
        endforeach;
        ?>
    </div>
</main>
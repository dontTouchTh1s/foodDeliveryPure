<?php
include("__PATH__.php");
$access = new check_access();
$access->check_roll(ROLL_ADMIN);
$productsList = [];
include(ACTIONS_PATH . "/admins/messages/show-action.php");
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="contact us">
    <meta name="author" content="AliM">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= STYLE_URL . '/style.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_URL . '/header.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_URL . '/components/data-table.css' ?>">
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>پیام های کاربران</title>
</head>
<body>
<?php include(PUBLIC_PATH . "/header.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container">
    <div class="content">
        <div class="table-data">
            <?php
            $tableData = new data_table($productsList);
            $tableData->head(['ردیف', 'عنوان', 'نام', 'ایمیل', 'متن پیام',]);
            $tableData->check("انتخاب");
            $tableData->action("حذف", TABLE_REMOVE);
            $tableData->action("نمایش", TABLE_SHOW);
            $tableData->add();
            ?>
        </div>
    </div>
</div>
<script src="<?= JS_URL . '/form_controls.js' ?>" type="text/javascript"></script>
<script src="<?= JS_URL . '/ripple_effect.js' ?>" type="text/javascript"></script>
<script src="<?= JS_URL . '/form_validate.js' ?>" type="text/javascript"></script>
</body>
</html>
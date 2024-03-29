<?php
include("__PATH__.php");
Authorisation::check_roll(ROLL_ADMIN);
$typeError = $stateError = $nameError = $priceError = $descriptionError = $pictureError = $error = "";
$mbList = [];
$type = $state = $name = $price = $description = $pictures = $product_id = "";
if (isset($_REQUEST['id']) and !empty($_REQUEST['id'])) {
    $product_id = $_REQUEST['id'];
} else {
    if (isset($_SERVER['HTTP_REFERER']))
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    else Redirect::request('show.php');
}
include(ACTIONS_PATH . "/admins/products/edit-action.php");
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="contact us">
    <meta name="author" content="AliM">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= STYLE_URL . '/style.css' ?>">

    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>ایجاد حساب کاربری</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php
include(PUBLIC_PATH . '/header.php');
if (Authorisation::get_roll() >= ROLL_ADMIN)
    include(ASSETS_PATH . "/template/admin-navigation-drawer.php");
else
    if (Authentication::isLogeIn())
        include(ASSETS_PATH . "/template/customer-navigation-drawer.php");
    else
        include(ASSETS_PATH . "/template/user-navigation-drawer.php");
?>
<div class="container">
    <div class="content">
        <div class="form-container form-admin">
            <h1 class="title">ویرایش محصول</h1>
            <p>مشخصات محصول را ویرایش و روی دکمه ثبت کلیک کنید.</p>
            <form class="form-vertical" method="post" action="<?= $_SERVER["PHP_SELF"] ?>"
                  enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $product_id ?>">
                <div class="form-group m-1 h-auto flex-50">
                    <select class="form-control form-control-select control-outlined h-2" value="<?= $type ?>"
                            name="type" id="type" required>
                        <option value="1">غذا</option>
                        <option value="2">پیش غذا</option>
                        <option value="3">نوشیدنی</option>
                    </select>
                    <label class="placeholder" for="type" id="type-placeholder">دسته بندی محصول</label>
                    <div class="error-message"></div>
                </div>

                <div class="form-group m-1 h-auto flex-50">
                    <select class="form-control form-control-select control-outlined h-2" value="<?= $state ?>"
                            name="state" id="state" required>
                        <option value="1">موجود</option>
                        <option value="2">ناموجود</option>
                    </select>
                    <label class="placeholder" for="state" id="state-placeholder">وضعیت</label>
                    <div class="error-message"></div>
                </div>
                <div class="form-group m-1 h-auto flex-50">
                    <input type="text" class="form-control form-control-input control-outlined h-2" value="<?= $name ?>"
                           name="name" id="name" aria-labelledby="name-placeholder" required>
                    <label class="placeholder" for="name" id="name-placeholder">نام محصول</label>
                    <div class="error-message" id="name-error"><?= $nameError ?></div>
                </div>


                <div class="form-group m-1 h-auto flex-50">
                    <input type="number" step="any" class="form-control form-control-input control-outlined h-2"
                           value="<?= $price ?>" id="price" name="price" aria-labelledby="price-placeholder"
                           required>
                    <label class="placeholder" for="price" id="price-placeholder">قیمت</label>
                    <div class="error-message" id="price-error"><?= $nameError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-100">
                    <textarea class="form-control form-control-textarea control-outlined h-auto"
                              value="<?= $description ?>"
                              name="description" id="description"
                              aria-labelledby="description-placeholder"><?= $description ?></textarea>
                    <label class="placeholder" for="description" id="description-placeholder">توضیحات
                        محصول</label>
                    <span class="textarea-hidden-overflow"></span>
                    <div class="error-message" id="description-error"><?= $nameError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-100">
                    <input type="file" style="display: none" name="picture[]" multiple
                           id="picture" aria-labelledby="picture-placeholder" required
                    >
                    <div class="form-control form-control-file control-outlined"
                         id="file-view">
                        <label class="file-label" for="picture" id="picture-placeholder"></label>
                        <button class="arrow" id="next-arrow" aria-disabled="true">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                        <button class="arrow" id="pre-arrow" aria-disabled="true">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <div class="file-placeholder">تصویر غذا
                            <div>برای آپلود کلیک کنید یا تصویر را به اینجا بکشید.</div>
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="picture-preview">
                            <div class="background"></div>
                            <img src="<?= UPLOAD_URL . '/products/' . $pictures ?>" alt="<?= $name ?>" class="picture">
                        </div>
                        <div class="file-description">
                            <span class="file-name" id="file-name">هیچ فایلی انتخاب نشده است</span>
                            <div class="file-counter">
                                <span id="file-count"></span>
                            </div>
                        </div>
                    </div>
                    <div class="error-message" id="picture-error" helper-text="حداکثر سایز 500kb"></div>
                </div>

                <div class="form-group h-2 flex-100">
                    <button type="button" class="btn btn-filled" id="submit-button">ثبت تغییرات</button>
                </div>
                <span><?= $error ?></span>
            </form>
        </div>
    </div>
</div>
<?php
foreach ($mbList as $ms)
    $ms->add();
?>
<script src="<?= JS_URL . '/javaScriptDynamicLoad.js' ?>" type="text/javascript"></script>
</body>
</html>
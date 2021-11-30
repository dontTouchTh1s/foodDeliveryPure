<?php
include("__PATH__.php");
$access = new check_access();
$access->check_roll(ROLL_ADMIN);
$typeError = $stateError = $nameError = $priceError = $descriptionError = $pictureError = $error = "";
include(ACTIONS_PATH . "/admins/products/add-action.php");
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
    <script src="https://kit.fontawesome.com/f5a43cdea2.js" crossorigin="anonymous"></script>
    <title>ایجاد حساب کاربری</title>
</head>
<body>
<?php include(PUBLIC_PATH . '/header.php'); ?>
<div class="container">
    <div class="right-pizza"></div>
    <div class="content">
        <div class="form-container">
            <h1>اضافه کردن محصول</h1>
            <p>برای اضافه کردن محصول جدید، مشخصات آن را وارد و روی دکمه ثبت کلیک کنید.</p>
            <form class="form-vertical" method="post" action='<?= $_SERVER["PHP_SELF"] ?>'
                  enctype="multipart/form-data">

                <div class="form-group m-1 h-auto flex-50">
                    <select class="form-control form-control-select control-filled h-2" value="" name="type" id="type">
                        <option value="1">غذا</option>
                        <option value="2">پیش غذا</option>
                        <option value="3">نوشیدنی</option>
                    </select>
                    <label class="placeholder" for="type" id="type-placeholder">دسته بندی محصول</label>
                    <div class="error-message"></div>
                </div>

                <div class="form-group m-1 h-auto flex-50">
                    <select class="form-control form-control-select control-filled h-2" value="" name="state"
                            id="state">
                        <option value="1">موجود</option>
                        <option value="2">ناموجود</option>
                    </select>
                    <label class="placeholder" for="state" id="state-placeholder">وضعیت</label>
                    <div class="error-message"></div>
                </div>
                <div class="form-group m-1 h-auto flex-50">
                    <input type="text" class="form-control form-control-input control-filled h-2" value="" name="name"
                           id="name" aria-labelledby="name-placeholder">
                    <label class="placeholder" for="name" id="name-placeholder">نام محصول</label>
                    <div class="error-message" id="name-error"><?= $nameError ?></div>
                </div>


                <div class="form-group m-1 h-auto flex-50">
                    <input type="text" step="any" class="form-control form-control-input control-filled h-2" value=""
                           name="price" id="price" aria-labelledby="price-placeholder">
                    <label class="placeholder" for="price" id="price-placeholder">قیمت</label>
                    <div class="error-message" id="price-error"><?= $nameError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-100">
                    <textarea class="form-control form-control-textarea control-filled h-auto" value=""
                              name="description" id="description" aria-labelledby="description-placeholder"></textarea>
                    <label class="placeholder" for="description" id="description-placeholder">توضیحات محصول</label>
                    <span class="textarea-hidden-overflow"></span>
                    <div class="error-message" id="description-error"><?= $nameError ?></div>
                </div>

                <div class="form-group m-1 h-auto flex-100">
                    <input type="file" style="display: none" value="" name="picture[]" multiple
                           id="picture" aria-labelledby="picture-placeholder">
                    <div class="form-control form-control-file control-filled" value="" id="file-view">
                        <label class="file-label" for="picture" id="picture-placeholder"></label>
                        <div class="arrow" id="next-arrow" aria-disabled="true">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                        <div class="arrow" id="pre-arrow" aria-disabled="true">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="file-placeholder">تصویر غذا
                            <div>برای آپلود کلیک کنید یا تصویر را به اینجا بکشید.</div>
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="picture-preview">
                            <div class="background"></div>
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
                    <button type="submit" class="btn btn-filled" id="submit-button">ثبت محصول</button>
                </div>
                <span><?= $error ?></span>
            </form>
        </div>
    </div>
</div>
<script src="<?= JS_URL . '/form_controls.js' ?>" type="text/javascript"></script>
<script src="<?= JS_URL . '/ripple_effect.js' ?>" type="text/javascript"></script>
<script src="<?= JS_URL . '/form_validate.js' ?>" type="text/javascript"></script>
<script src="<?= JS_URL . '/control_file.js' ?>" type="text/javascript"></script>
</body>
</html>
<?php if (!is_user_logged_in()): die("You are not allowed to see this page"); endif; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet"
          href="<?= get_template_directory_uri(); ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/app.css">
</head>
<body>
<div class="container mt-5 installment-form text-right">
    <div class="row">
        <div class="col-md-12 text-center mb-5">
            <h1>
                فرم درخواست پرداخت اقساطی
            </h1>
        </div>
    </div>
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR .
        'wp-content' . DIRECTORY_SEPARATOR .
        'themes' . DIRECTORY_SEPARATOR .
        'Arad Payment' . DIRECTORY_SEPARATOR .
        'installments' . DIRECTORY_SEPARATOR . get_queried_object()->ID . '.txt';
    $forms = json_decode(file_get_contents($path), true);
    foreach ($forms as $key => $form):?>
        <div class="row list-group list-group-flush list-group-horizontal mt-5">
            <div class="col-md-12 list-group-item list-group-item-secondary">
                <h4><?= $form['form_name'] ?></h4>
            </div>
            <?php foreach ($form['inputs'] as $item => $value): ?>
                <?php if ($value[2] == 'pic-one'): ?>
                    <div class="col-md-12  list-group-item">
                        <span class="text-muted"><?= $value[0] . ':' ?></span>
                        <br>
                        <img width="100%" src="<?= get_document_url("pic-one"); ?>" alt="#">
                        <!--                        <span>--><? //= $value[1] ?><!--</span>-->
                    </div>
                <?php elseif ($value[2] == 'pic-two'): ?>
                    <div class="col-md-12  list-group-item">
                        <span class="text-muted"><?= $value[0] . ':' ?></span>
                        <br>
                        <img width="100%" src="<?= get_document_url("pic-two"); ?>" alt="#">
                        <!--                        <span>--><? //= $value[1] ?><!--</span>-->
                    </div>
                <?php else: ?>
                    <div class="col-md-<?= (ceil(strlen($value[1]) > 20)) ? 7 : 3 ?>  list-group-item">
                        <span class="text-muted"><?= $value[0] . ':' ?></span>
                        <br>
                        <span><?= $value[1] ?></span>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script src="<?= get_template_directory_uri(); ?>/assets/js/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>-->
<script src="<?= get_template_directory_uri(); ?>/assets/js/app.js"></script>
<script src="<?= get_template_directory_uri(); ?>/assets/js/main.js"></script>
</body>
</html>
<?php


function get_document_url($documentName)
{
    $path = $_SERVER['DOCUMENT_ROOT'] . '/wp-content/uploads/formUploads/';

    $session = get_queried_object()->post_title;
    $directory = scandir($path);
    $targetImage = "";

    foreach ($directory as $img) {
        $exploaded = explode('_', $img);
        if (count($exploaded) > 1) {
            if ($exploaded[0] === $session) {
                if ($documentName == 'pic-one') {
                    $extExpload = explode('.', $exploaded[1]);
                    if ($extExpload[0] == 1) {
                        $targetImage = $img;
                    }
                }
                if ($documentName == 'pic-two') {
                    $extExpload = explode('.', $exploaded[1]);
                    if ($extExpload[0] == 2) {
                        $targetImage = $img;
                    }
                }

            }
        }
    }
    $path = 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content/uploads/formUploads/' . $targetImage;

    return $path;
}

?>

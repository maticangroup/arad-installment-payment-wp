<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Installment payment | Arad Mobile</title>
    <link rel="shortcut icon" href="https://aradmobile.com/wp-content/uploads/2018/10/AradFavicon.png" type="image/x-icon" />
    <link rel="stylesheet"
          href="<?= get_template_directory_uri(); ?>/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"/>
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/app.css">
    <script>
        let _info = {
            templateUrl: '<?php assets(''); ?>'
        };
        let $session = Math.floor(Math.random() * 999999999) + 1;
    </script>
</head>
<body class="">
<div class="bg-blur"></div>
<div class=" message success-messages text-right d-none">

</div>
<div class=" message error-messages text-right d-none">
    <ul class="error-list">

    </ul>
</div>

<?php require "calculator.php" ?>
<section class="view-port">

    <?php require "page-1-intro.php" ?>
    <?php require "page-2-check.php" ?>
    <?php require "page-3-personal-info.php" ?>
    <?php require "page-4-job-info.php" ?>
    <?php require "page-5-living-location.php" ?>
    <?php require "page-6-bank-info.php" ?>
    <?php require "page-7-purchase-info.php" ?>
    <?php require "page-8-upload-info.php" ?>
    <?php require "page-9-explanation-info.php" ?>
    <?php require "arrows.php"; ?>

</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script src="<?= get_template_directory_uri(); ?>/assets/js/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--<script src="./node_modules/bootstrap/dist/js/bootstrap.js"></script>-->
<script src="<?= get_template_directory_uri(); ?>/assets/js/app.js"></script>
<script src="<?= assets('assets/js/main.js'); ?>"></script>
<script src="<?= assets('assets/js/main2.js'); ?>"></script>
</body>
</html>
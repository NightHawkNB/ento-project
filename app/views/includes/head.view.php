<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?> | <?= ucfirst(App::$page) ?></title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/framework.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/necessary.css">
<!--    <script src="https://kit.fontawesome.com/2840cb1323.js" crossorigin="anonymous"></script>-->
    <script src="<?= ROOT ?>/assets/scripts/script.js" defer></script>
    <script src="<?= ROOT ?>/assets/scripts/validation.js" defer></script>
    <link href="<?= ROOT ?>/assets/logo.png" rel="icon">
        <?php
            if(!empty($style)) {
                foreach ($style as $link) {
                    echo '<link rel="stylesheet" href="'.ROOT.'/assets/css/'.$link.'">';
                }
            }
        ?>
</head>
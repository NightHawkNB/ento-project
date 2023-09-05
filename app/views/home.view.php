<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/framework.css?v=1">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/necessary.css?v=1">
</head>
<body>
    <?php if(message()): ?>
        <div id="alert-msg"><?= message('', true); ?></div>
    <?php endif; ?>
    <?php $this->view('includes/header') ?>

    <div style="text-align: center; padding-top: 1px">
        <h1>Welcome to the Home Page</h1>
    </div>

    <?php $this->view('includes/footer') ?>
</body>
</html>
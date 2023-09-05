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

    <div style="text-align: center; padding-top: 1px">
        <h1><?= APP_NAME ?> | Login</h1>
    </div>

    <div class="form-container">
        <div class="form-container-2">
            <form method="post">
                <div class="form-input">
                    <label for="email">Email </label><br>
                    <input value="<?= set_value('email') ?>" type="email" name="email" id="email" class="input-field <?= !empty($errors['email']) ? 'error-border' : ''; ?>" required>
                    <?php if(!empty($errors['email'])):?>
                        <div class="error-msg"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-input">
                    <label for="password">Password </label><br>
                    <input value="<?= set_value('password') ?>" type="password" name="password" id="password" class="input-field <?= !empty($errors['password']) ? 'error-border' : ''; ?>" required>
                    <?php if(!empty($errors['password'])):?>
                        <div class="error-msg"><?= $errors['password'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-button">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
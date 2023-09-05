<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/framework.css?v=1">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/necessary.css?v=1">
</head>

<body class="log-sign-body">




    <div style="text-align: center; padding-top: 1px">
        <h1><?= APP_NAME ?> | Signup</h1>
    </div>

    <div class="form-container">
        <div class="form-container-2">
            <!-- action="<?= ROOT ?>/signup/post" -->
            <form method="post">
                <div class="form-input">
                    <label for="fname">First Name </label><br>
                    <input value="<?= set_value('fname') ?>" type="text" name="fname" id="fname" class="input-field <?= !empty($errors['fname']) ? 'error-border' : ''; ?>" required>
                    <?php if(!empty($errors['fname'])):?>
                        <div class="error-msg"><?= $errors['fname'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-input">
                    <label for="lname">Last Name </label><br>
                    <input value="<?= set_value('lname') ?>" type="text" name="lname" id="lname" class="input-field <?= !empty($errors['lname']) ? 'error-border' : ''; ?>" required>
                    <?php if(!empty($errors['lname'])):?>
                        <div class="error-msg"><?= $errors['lname'] ?></div>
                    <?php endif; ?>
                </div>
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
                <div class="form-input">
                    <label for="password_retype">Retype Password </label><br>
                    <input value="<?= set_value('password_retype') ?>" type="password" name="password_retype" id="password_retype" class="input-field <?= !empty($errors['password_retype']) ? 'error-border' : ''; ?>" required>
                    <?php if(!empty($errors['password_retype'])):?>
                        <div class="error-msg"><?= $errors['password_retype'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-input">
                    <label for="contact_num">Contact number </label><br>
                    <input value="<?= set_value('contact_num') ?>" type="text" name="contact_num" id="contact_num" class="input-field <?= !empty($errors['contact_num']) ? 'error-border' : ''; ?>" required>
                    <?php if(!empty($errors['contact_num'])):?>
                        <div class="error-msg"><?= $errors['contact_num'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-input">
                    <input <?= set_value('terms') ? 'checked' : '' ?> type="checkbox" name="terms" id="terms"><label for="terms">Terms and Conditions</label>
                    <?php if(!empty($errors['terms'])):?>
                        <div class="error-msg"><?= $errors['terms'] ?></div>
                    <?php endif; ?>
                </div>
                <div class="form-button">
                    <input type="submit" value="Signup">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
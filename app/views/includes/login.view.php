<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php if(message()): ?>
            <div class="alert-msg"><?= message('', true); ?></div>
        <?php endif; ?>

        <div class="form-heading cols-12" style="text-align: center; padding-top: 1px">
            <h1><?= APP_NAME ?> | Login</h1>
        </div>
        <div class="form-container cols-12 ai-c">
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
        <p class="text-center cols-12">Don't have an Account ? <a href="/signup" class="link">Create an Account</a></p>
    </div>
</body>

</html>
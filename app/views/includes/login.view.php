<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper auth-page">

        <?php if(message()): ?>
            <div class="alert-msg cols-12"><?= message('', true); ?></div>
        <?php else: ?>
            <div></div>
        <?php endif; ?>

        <div class="dis-flex-col al-it-ce ju-co-ce cols-12 bg-black-2">
            <div class="bg-trans pad-20 bor-rad-5 dis-flex-col">
                <div class="login-form">
                    <form method="post" class="pos-abs dis-flex-col al-it-ce">
                        <h2>Login</h2>
                        <div class="input-box">
                            <input type="email" name="email" required>
                            <label for="email">Email</label>
                            <i></i>
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" required>
                            <label for="password">Password</label>
                            <i></i>
                        </div>
                        <p>Don't have an Account ? <a href="<?= ROOT ?>/signup">Create an Account</a></p>
                        <button type="submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
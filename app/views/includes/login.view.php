<html lang="en">
<?php $this->view('includes/head', ['style' => 'auth/login.css']) ?>
<body>
    <div class="auth-overlay"></div>
    <div class="dis-flex ju-co-ce al-it-ce pad-20 wid-100 hei-100">

        <?php if(message()): ?>
            <div class="alert-msg cols-12"><?= message('', true); ?></div>
        <?php else: ?>
            <div></div>
        <?php endif; ?>

        <main class="login-container auth-container sh">
            <div class="login left-section">
                <form method="post" class="dis-flex-col al-it-ce">
                    <h2>Login</h2>
                    <div class="input-box">
                        <label for="email">Email</label>
                        <input type="email" name="email" required>
                        <i></i>
                    </div>
                    <div class="input-box">
                        <label for="password">Password</label>
                        <input type="password" name="password" required>
                        <i></i>
                    </div>
                    <p>Don't have an Account ? <br/> <a href="<?= ROOT ?>/signup">Create an Account</a></p>
                    <button class="sh" type="submit">Login</button>
                </form>
            </div>

            <div class="login right-section">
                <img src="<?= ROOT ?>/assets/images/icons/login.jpg" alt="login">
            </div>
        </main>

    </div>
</body>

</html>
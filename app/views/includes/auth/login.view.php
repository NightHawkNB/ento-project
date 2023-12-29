<html lang="en">
<?php $this->view('includes/head', ['style' => 'auth/login.css']) ?>
<body>
    <div class="auth-overlay"></div>
    <div class="dis-flex ju-co-ce al-it-ce pad-20 wid-100 hei-100">

        <?php
        if(message()) {
            switch ($_SESSION['alert-status']) {
                case 'neutral':
                    $status = "neutral";
                    $heading = "Alert";
                    break;
                case 'success':
                    $status = "success";
                    $heading = "Success";
                    break;
                case 'failed':
                    $status = "failed";
                    $heading = "Error";
                    break;
                default :
                    $status = "";
                    $heading = "";
            }
        }
        ?>

        <!-- START OF Popup message box -->
        <div class="alert <?= $status ?> dis-flex gap-10 al-it-ce <?= (message()) ? 'show' : '' ?>" id="alert-window">
            <?php if($status == "success"): ?>
                <svg class="feather feather-check-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            <?php endif; ?>
            <?php if($status == "neutral"): ?>
                <svg class="feather feather-alert-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
            <?php endif; ?>
            <?php if($status == "failed"): ?>
                <svg class="feather feather-x-circle" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"/><line x1="15" x2="9" y1="9" y2="15"/><line x1="9" x2="15" y1="9" y2="15"/></svg>
            <?php endif; ?>

            <p class="flex-1">
                <?= $heading ?> : <?= message('', true); ?>
            </p>
        </div>
        <!-- END OF Popup message box -->

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
                <img src="<?= ROOT ?>/assets/images/icons/auth/login.jpg" alt="login">
            </div>
        </main>

    </div>
</body>

</html>
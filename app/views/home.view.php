<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php if(message()): ?>
            <div class="alert-msg"><?= message('', true); ?></div>
        <?php endif; ?>
        
        <?php $this->view('includes/header') ?>

        <main>
            <div style="text-align: center; padding-top: 1px">
                <h1>Welcome to the Home Page</h1>
            </div>
        </main>

        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>
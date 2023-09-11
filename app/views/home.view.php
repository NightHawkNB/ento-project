<html lang="en">
<?php $this->view('includes/head') ?>
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
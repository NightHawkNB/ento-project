<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
                <?php $this->view(strtolower($_SESSION['USER_DATA']->user_type).'/sidebar'); ?>
            </section>
            <section class="cols-10 profile">
                <div class="profile-container">
                    <?php $this->view('includes/profile/profile-details', (array)$user) ?>
                </div>
                <div class="profile-container">
                    <?php $this->view('includes/profile/profile-details', (array)$user) ?>
                </div>
            </section>
        </main>
        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>
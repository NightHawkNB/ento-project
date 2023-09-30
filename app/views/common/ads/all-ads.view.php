<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
                <?php $this->view('common/sidebar'); ?>
            </section>
            <section class="tile-container cols-10">
                <h1>All Ads Page</h1>

                <!-- Dummy Data Start -->
                    <?php $this->view('includes/ad-component') ?>
                <!-- Dummy Data End -->
                
            </section>
        </main>
        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>
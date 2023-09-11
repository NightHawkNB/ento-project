<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <?php $this->view('includes/header') ?>

    <section class="main-container">
        <section class="sidebar">
            <?php $this->view("includes/sidebar") ?>
        </section>
        
        <main>
            <section class="content">
                <h2 class="text-center">Service Provider Profile</h2>
                <div class="profile-details">
                    <?php $this->view('includes/profile-details', (array)$user) ?>
                </div>
            </section>

            <?php $this->view('includes/footer-mini') ?>
        </main>
    </section>
</body>
</html>
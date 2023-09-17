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
            <section class="tile-container cols-10">
                <a href="#post-ads">
                    <div class="tile">
                        <img src="<?= ROOT ?>/assets/images/post-ads.svg" alt="Post Ads">
                        <p>Post Ads</p>
                    </div>
                </a>
                <a href="#view-ads">
                    <div class="tile">
                        <img src="<?= ROOT ?>/assets/images/view-ads.svg" alt="View Ads">
                        <p>View Ads</p>
                    </div>
                </a>
                <a href="#view-events">
                    <div class="tile">
                        <img src="<?= ROOT ?>/assets/images/view-event.svg" alt="View Event">
                        <p>View Event</p>
                    </div>
                </a>
                <a href="#view-res-req">
                    <div class="tile">
                        <img src="<?= ROOT ?>/assets/images/view-res-req.svg" alt="View Reservation Requests">
                        <p>View Reservations Requests</p>
                    </div>
                </a>
                <a href="#view-reservations">
                    <div class="tile">
                        <img src="<?= ROOT ?>/assets/images/view-res.svg" alt="View Reservation">
                        <p>View Your Reservations</p>
                    </div>
                </a>
            </section>
        </main>
        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>
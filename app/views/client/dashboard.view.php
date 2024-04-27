<html lang="en">
<?php $this->view('includes/head', ['style' => ['client/dashboard.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="pad-10 dis-flex-col al-it-ce wid-100">
            <div id="slider">
                <figure>
                    <img src="<?= ROOT ?>/assets/images/event1.jpg">
                    <img src="<?= ROOT ?>/assets/images/event2.jpg">
                    <img src="<?= ROOT ?>/assets/images/event3.jpg">
                    <img src="<?= ROOT ?>/assets/images/event4.jpg">
                    <img src="<?= ROOT ?>/assets/images/event5.jpg">
                </figure>
            </div>

            <div class="dis-flex al-it-ce">
                <a href="<?= ROOT ?>/home/ads">

                    <div class="other" style="background-image: url('<?= ROOT ?>/assets/images/singer.jpg');
                            background-size: cover;
                            background-position: center top -25px;
                            color: white;">
                        Book A Vocalist
                    </div>
                </a>
                <a href="<?= ROOT ?>/home/ads">
                    <div class="other" style="background-image: url('<?= ROOT ?>/assets/images/band.jpg');
                            background-size: cover;
                            background-position: center top -70px;
                            color: white;">
                        Book A Music Band
                    </div>
                </a>
                <a href="<?= ROOT ?>/home/ads">
                    <div class="other" style="background-image: url('<?= ROOT ?>/assets/images/venue.jpg');
                            background-size: cover;
                            background-position: center top 100px;
                            color: white;">
                        Book A Venue
                    </div>
                </a>
            </div>

        </section>

    </main>
</div>
</body>
</html>



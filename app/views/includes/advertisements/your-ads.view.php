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
                <h1 style="width: 100%">Your Ads Page</h1>

                <!-- Dummy Data Start -->
                    <div class="ad-single">
                        <img class="ad-image" src="<?= ROOT ?>/assets/images/ads/1.jpg" alt="Ad_01">
                        <div class="ad-container">
                            <div class="ad-content ad-title">
                                <span>
                                    Singer - Contact for more details
                                </span>
                            </div>

                            <div class="ad-content ad-details">
                                <span>
                                    learn knew brave also brother cry know threw nodded positive animal chose wolf hole construction agree lesson swam better finally half throat dull period
                                </span>
                            </div>

                            <div class="ad-content ad-props">
                                <div class="ad-cats">
                                    <p>Categories : </p>
                                    <span>
                                        <span class="cats">Category 01</span>
                                        <span class="cats">Category 02</span>
                                    </span>
                                </div>

                                <div class="ad-price">
                                    <p>Price Range : </p>
                                    <span>
                                        50 000 - 100 000
                                    </span>
                                </div>

                                <div class="ad-response">
                                    <p>Average Response Time : </p>
                                    <span>
                                        2 hours
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Dummy Data End -->

            </section>
        </main>
        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>
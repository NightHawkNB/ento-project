<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <?php $this->view('includes/header') ?>

    <section class="main-container">
        <section class="sidebar">
            <?php $this->view("includes/sidebar") ?>
        </section>
        
        <main>
            <h2 class="text-center">Service Provider's Reservations</h2>
            <section class="content">
                <?php
                    foreach($records as $reservation) {
                        $this->view('includes/mini-res-details', (array)$reservation);
                    }
                ?>
            </section>

            <?php $this->view('includes/footer-mini') ?>
        </main>
    </section>
</body>
</html>
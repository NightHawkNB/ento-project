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
            <section class="cols-10">
                    <?php
                        foreach($records as $reservation) {
                            $this->view('includes/mini-res-details', (array)$reservation);
                        }
                    ?>
            </section>
        </main>
        <?php $this->view('includes/footer') ?>
    </div>
</body>
</html>
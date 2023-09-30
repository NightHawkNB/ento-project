<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="cols-10">
                    <?php
                        foreach($requests as $reservation) {
                            $this->view('common/reservations/res-requests', (array)$reservation);
                        }
                    ?>
            </section>
        </main>
    </div>
</body>
</html>
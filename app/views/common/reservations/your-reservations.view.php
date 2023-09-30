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
                        foreach($records as $reservations) {
                            $this->view('common/reservations/res-details', (array)$reservations);
                        }
                    ?>
            </section>
        </main>
    </div>
</body>
</html>
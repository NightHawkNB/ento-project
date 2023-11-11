<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="wid-100 pad-10">
                    <?php
                        if(!empty($requests)) {
                            foreach($requests as $reservation) {
                                $this->view('common/reservations/res-requests', (array)$reservation);
                            }
                        } else {
                            echo "<h3 class='txt-c-white'>No requests to show</h3>";
                        }
                    ?>
            </section>
        </main>
    </div>
</body>
</html>
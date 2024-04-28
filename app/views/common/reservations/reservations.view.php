<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10 dis-flex-col al-it-ce">

            <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem">Current Reservations</h1>

            <div class="pad-20 glass-bg wid-100 bor-rad-10 hei-100 dis-flex-col gap-10" style="overflow: auto">
                <?php
                if(!empty($reservations)) {
                    foreach($reservations as $reservation) {
                        $this->view('common/reservations/components/reservation', (array)$reservation);
                    }
                } else {
                    echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No reservations to show</h3>";
                }
                ?>
            </div>

        </section>
    </main>
</div>
</body>
</html>
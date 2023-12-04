<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-20 mar-bot-10">
            <div class="dis-flex-col gap-10 bg-grey pad-10 bor-rad-5 txt-c-white" style="height: 100%">
                <h2 class="mar-0" >Reservation Details</h2>

                <div class="dis-flex-col gap-10 bg-grey pad-10 bor-rad-5 txt-c-white" style="height: auto">
                    <?php
//                    show($data);
//                    show($reservations);
//                    show($reservations[0]);
                    foreach ($reservations as $reservation)
                    {
                        $this->view('client/components/reservation', (array)$reservation);
                    }

                    ?>

                </div>

            </div>
        </section>
    </main>
</div>
</body>
</html>
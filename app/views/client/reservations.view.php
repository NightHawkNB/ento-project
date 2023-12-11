<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
<!--        <section class="cols-10 pad-20 mar-bot-10">-->
<!--            <div class="dis-flex-col gap-10 bg-grey pad-10 bor-rad-5 txt-c-white" style="height: 100%">-->
<!--                <h2 class="mar-0" >Reservation Details</h2>-->
<!---->
<!--                <div class="dis-flex-col gap-10 bg-grey pad-10 bor-rad-5 txt-c-white" style="height: auto">-->
<!--                    --><?php
////                    show($data);
////                    show($reservations);
//////                    show($reservations[0]);
//                    foreach ($reservations as $reservation)
//                    {
//                        $this->view('client/components/reservation', (array)$reservation);
//                    }
//
//                    ?>
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->
<!--        </section>-->
        <section class="wid-100 pad-10 dis-flex-col al-it-ce">

            <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem">Reservations</h1>

            <div class="component-list wid-80">
                <div class="reservations">
                    <p>Service provider's Name</p>
                    <p>Created date and Time</p>
                    <p>Location</p>
                    <p>Time Remaining</p>
                    <p>Status</p>
<!--                    <p>Actions</p>-->
                </div>

                <?php
                if(!empty($reservations)) {
                    foreach($reservations as $reservation) {
                        $this->view('client/components/reservation', (array)$reservation);
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
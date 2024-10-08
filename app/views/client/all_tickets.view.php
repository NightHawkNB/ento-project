<html lang="en">
<script src="<?= ROOT ?>/assets/scripts/qrcode.min.js"></script>
<?php $this->view('includes/head', ['style' => ['admin/adverification.css']]) ?>
<body>

<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10 dis-flex-col al-it-ce">


            <div class="bg-black-1 wid-100 hei-100">
                <form method="post" action="<?= ROOT ?>/home/form">
                    <input type="text" id="name" name="name" placeholder="Enter Name">
                    <input type="date" id="bday" name="bday">
                    <input type="radio" name="gender" value="Male"> Male
                    <input type="radio" name="gender" value="Female"> Female

                    <button class="button-s2">Submit</button>
                </form>
            </div>

            <section id="current" class="wid-100 pad-10 dis-flex-col al-it-ce  hei-100">

                <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem">Tickets</h1>
                <div class="res-container glass-bg">
                    <div class="reservation txt-w-bold mar-10" style="background-color: #c7b2f1; border-radius: 10px 10px 0 0">
                        <div>Event Name</div>
                        <div>Data</div>
                        <div>Start Time</div>
                        <div>End Time</div>
                        <div>Action</div>

                    </div>

                   <div >
                       <?php

                       if (!empty($bought_tickets)) {
                           foreach ($bought_tickets as $bought_ticket) {
//                            show($bought_ticket);
//
                               $this->view('client/components/all_ticket', (array)$bought_ticket);
                           }
                       } else {
                           echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No bought tickets to show</h3>";
                       }
                       ?>
                   </div>
                </div>

            </section>

        </section>
    </main>
</div>
</body>
</html>

<html lang="en">
<!--cdnjs link for qr js library-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<script src="--><?php //= ROOT ?><!--/assets/scripts/html5-qrcode.min.js"></script>-->
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10 dis-flex-col al-it-ce  hei-100">

            <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem">Bought Tickets</h1>

            <div class="wid-80 glass-bg dis-flex gap-20 pad-20 hei-100 wid-100">

                <?php
                if(!empty($bought_tickets)) {
//                    show($bought_tickets);
                    foreach($bought_tickets as $bought_ticket) {
                        $this->view('client/components/bought_ticket', (array)$bought_ticket);
                    }
                } else {
                    echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No bought tickets to show</h3>";
                }
                ?>
            </div>

        </section>
    </main>
</div>
</body>
</html>
<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="wid-100 pad-10 dis-flex-col al-it-ce  hei-100">

            <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem">Brought tickets</h1>

            <div class="wid-80 glass-bg dis-flex ">

                <?php
                if(!empty($brought_tickets)) {
//
                    
                    foreach($brought_tickets as $brought_ticket) {
                        $this->view('client/components/brought_ticket', (array)$brought_ticket);
                    }
                } else {
                    echo "<h3 class='txt-c-white wid-100 dis-flex ju-co-ce'>No brought tickets to show</h3>";
                }
                ?>
            </div>

        </section>
    </main>
</div>
</body>
</html>
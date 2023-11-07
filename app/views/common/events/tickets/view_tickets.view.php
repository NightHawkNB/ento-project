<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <?php if(Auth::logged_in()): ?>
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
        <?php endif; ?>
        <section class="cols-10 pad-20 mar-bot-10">
            <div class="bg-white dis-flex-col gap-20 bg-lightgray flex-1 pad-20">
                <div class="dis-flex ju-co-sb">
                    <h1 class="txt-c-black">Tickets</h1>
                </div>
                <div class="dis-flex-col bg-trans gap-10 pad-20 txt-ali-cen">
                    <?php
                    if(!empty($tickets)) {
                        foreach ($tickets as $ticket) {
                            $this->view('common/events/tickets/single', (array)$ticket);
                        }
                    } else {
                        echo "No complaints to show";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
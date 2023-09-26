<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
            <?php $this->view(strtolower($_SESSION['USER_DATA']->user_type).'/sidebar'); ?>
        </section>
        <section class="cols-10 pad-20 mar-bot-10">
            <div class="dis-flex-col gap-10 bg-grey pad-10 bor-rad-5 txt-c-white" style="height: 100%">
                <h2 class="mar-0">Reservation Details</h2>
                <div class="dis-flex gap-10">
                    <div class="dis-flex-col">
                        Reservation Details - 1
                    </div>
                    <div class="dis-flex-col">
                        Reservation Details - 2
                    </div>
                </div>
                <div>
                    Accept or Deny Buttons
                </div>
            </div>
        </section>
    </main>
    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>
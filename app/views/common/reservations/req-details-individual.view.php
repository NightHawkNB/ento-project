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
            <div class="dis-flex-col gap-10 bg-grey pad-20 bor-rad-5 txt-c-white" style="height: 100%">
                <h2 class="mar-0">Reservation Request Details</h2>
                <div class="dis-flex gap-10 flex-1">
                    <div class="dis-flex-col">
                        Reservation Request Details - 1
                    </div>
                    <div class="dis-flex-col">
                        Reservation Request Details - 2
                    </div>
                </div>
                <div class="dis-flex ju-co-sa">
                    <a href="#accept">
                        <button class="btn-lay-2 hover-pointer">Accept</button>
                    </a>
                    <a href="#deny">
                        <button class="btn-lay-2 hover-pointer">Deny</button>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
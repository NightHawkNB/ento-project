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
                    <h1 class="txt-c-black">Assistance Requests</h1>
                </div>
                <div class="dis-flex-col bg-trans gap-10 pad-20 txt-ali-cen">
                <?php
                    if(!empty($assists)) {
                        foreach ($assists as $assist) {
                            $this->view('pages/complaints/single_request', (array)$assist);
                        }
                    } else {
                        echo "No complaints to show";
                    }
                ?>
                </div>
            </div>
        </section>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>
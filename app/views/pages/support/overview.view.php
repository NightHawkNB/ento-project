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
            <div class="dis-flex-col gap-20 flex-1 pad-20">
                <div class="dis-flex ju-co-sb">
                    <h1 class="txt-c-white txt-w-bolder" style="font-size: 2rem; font-weight: bolder">Your Complaints</h1>
                    <a class="push-right" href="<?= ROOT ?>/home/complaint">
                        <button class="btn-lay-2 btn-anima-hover hover-pointer">Create complaint</button>
                    </a>
                </div>
                <div class="dis-flex-col bg-trans gap-10 pad-20 txt-ali-cen">
                    <?php
                        if(!empty($complaints)) {
                            foreach ($complaints as $complaint) {
                                $this->view('pages/complaints/single', (array)$complaint);
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
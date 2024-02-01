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
            <div class="bg-trans dis-flex-col gap-20 bg-lightgray flex-1 pad-20">
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
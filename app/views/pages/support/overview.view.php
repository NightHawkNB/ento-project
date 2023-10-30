<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="bg-lightgray dis-flex al-it-ce ju-co-ce">

        <div class="bg-white dis-flex-col gap-20 flex-1 pad-20">
            <h1 class="txt-c-black">complaint list</h1>
            <a class="push-right" href="<?= ROOT ?>/home/complaint">
                <button class="btn-lay-2 btn-anima-hover hover-pointer">Create complaint</button>
            </a>
            <div class="txt-c-white dis-flex-col gap-10">
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
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>
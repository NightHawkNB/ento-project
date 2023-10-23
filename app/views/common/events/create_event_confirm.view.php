<html lang="en">
<?php $this->view('includes/head') ?>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-10 dis-flex ju-co-st al-it-st">
            <div class="wid-100 pad-10 gap-10 bor-rad-5 dis-flex-col ju-co-ce al-it-ce gap-20">

                <h2>Confirmation Page</h2>

                <div class="wid-100 dis-flex ju-co-ce al-it-ce gap-20">
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/5">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal">Back</span>
                    </a>
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/7">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal">Confirm</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
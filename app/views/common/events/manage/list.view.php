<html lang="en">
<?php $this->view('includes/head') ?>

<style>
    input[type=file] {
        border: none;
    }

    #svg-01 {
        height: 1.4rem;
    }

    .new {}

    .add-btn {
        height: 40px;
        width: 40px;
        padding: 10px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 1s ease;
        bottom: 20px;
        right: 20px;
        position: absolute;
        z-index: 1;
    }

    .add-btn:hover {
        transform: rotate(90deg);
    }
</style>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-10 dis-flex ju-co-st al-it-st">
            <div class="bg-white wid-100 pad-10 bor-rad-5 dis-flex-col ju-co-ce al-it-ce gap-20">

                <div class="bg-white dis-flex gap-20 pad-20 flex-wrap wid-100 ju-co-ce">
                    <?php
                        foreach ($events as $event) $this->view('common/events/list-item', (array)$event);
                    ?>
                </div>

                <div class="wid-100 dis-flex ju-co-ce">
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/manage/2">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal min-w-150">Next</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
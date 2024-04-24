<html lang="en">
<?php $this->view('includes/head', ['style' => ['client/dashboard.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="pad-10 dis-flex-col al-it-ce wid-100">
<!--            <h1 class="mar-10-0 txt-c-black txt-w-bold" style="font-size: 1.5rem">Dashboard</h1>-->
            <div id="slider">
                <figure>
                    <img src="<?=ROOT?>/assets/images/event/EVENT_11812_1708704770.png">
                    <img src="<?=ROOT?>/assets/images/event/EVENT_13920_1710128400.png">
                    <img src="<?=ROOT?>/assets/images/event/EVENT_11812_1708704770.png">
                    <img src="<?=ROOT?>/assets/images/event/EVENT_13920_1710128400.png">
                    <img src="<?=ROOT?>/assets/images/event/EVENT_11812_1708704770.png">
                </figure>
            </div>

        </section>

    </main>
</div>
</body>
</html>



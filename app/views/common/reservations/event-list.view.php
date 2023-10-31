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
            <div class="dis-flex wid-100 ju-co-sb bg-lightgray bor-rad-5 pad-10 al-it-ce f-poppins">
                <p>Event Name : Yaathra</p>
                <a href=<?= ROOT."/".strtolower($_SESSION['USER_DATA']->user_type)."/reservations/event-details"?>>
                    <button class="btn-lay-2 hover-pointer">Details</button>
                </a>
            </div>
        </section>
    </main>
</div>
</body>
</html>
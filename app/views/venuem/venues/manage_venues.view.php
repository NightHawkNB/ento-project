<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="wid-100 al-it-ce pad-10 dis-flex-col">

            <h1 class="mar-10-0 txt-c-white txt-w-bold" style="font-size: 1.5rem">Venue Management</h1>

            <div class="hei-100 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5 over-scroll">
                <div class="dis-flex wid-100 ju-co-sb">
                    <a href="<?= ROOT ?>/venuem/venues/insert">
                        <button class="blue-btn">+ Add New</button>
                    </a>

                    <a href="profile/verify" class="push-right">
                        <button class="blue-btn">Filter by</button>
                    </a>
                </div>

                <div class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10    ">
                    <?php
                    if(!empty($venues)) {
                        foreach ($venues as $venue) {
                            $this->view('venuem/venues/components/venue', (array)$venue);
                        }
                    } else {
                        echo "<p class='txt-c-white'>No Venues Found</p>";
                    }
                    ?>
                </div>

            </div >
        </section>
    </main>
</div>
</body>
</html>
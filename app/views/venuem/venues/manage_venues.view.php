<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex">
            <div class="glass-bg mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5">
                <a href="profile/verify" class="push-right">
                    <button class="btn-lay-2 hover-pointer"  style="background-color:purple; text-align:right; border: none" >Filter by</button>
                </a>

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

                <div class="dis-flex ju-co-se">
                    <a href="<?= ROOT ?>/venuem/venues/insert">
                        <button class="btn-lay-2 push-right hover-pointer"  style="background-color:purple; text-align:right; border: none" >+ Add New</button>
                    </a>
                </div>
            </div >
        </section>
    </main>
</div>
</body>
</html>
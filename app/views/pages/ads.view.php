<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="bg-lightgray dis-flex ju-co-st al-it-st">
        <div class="dis-flex-col al-it-ce bg-trans wid-100 mar-10 bor-rad-5 over-hide">
            <div class="bg-lightgray txt-c-black pad-10 wid-100 flex-1 dis-flex-col gap-10">
                <?php
                    foreach ($ad_singer as $ad) {
                        $this->view('includes/ad-s', (array)$ad);
                    }

                    foreach ($ad_band as $ad) {
                        $this->view('includes/ad-component', (array)$ad);
                    }

                    foreach ($ad_venue as $ad) {
                        $this->view('includes/ad-component', (array)$ad);
                    }
                ?>
            </div>
        </div>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>
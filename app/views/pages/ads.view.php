<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dis-flex ju-co-st al-it-st">
        <div class="dis-flex-col al-it-ce bg-trans wid-100 mar-10 bor-rad-5 over-hide">

            <div class="txt-c-black pad-10 wid-100 flex-1 dis-flex-col gap-10">
                <?php

                    if(!empty($ad_singer)) {
                        foreach ($ad_singer as $ad) {
                            $this->view('includes/ad-s', (array)$ad);
                        }
                    }

                    if(!empty($ad_band)) {
                        foreach ($ad_band as $ad) {
                            $this->view('includes/ad-b', (array)$ad);
                        }
                    }

                    if(!empty($ad_venue)) {
                        foreach ($ad_venue as $ad) {
                            $this->view('includes/ad-v', (array)$ad);
                        }
                    }
                ?>
            </div>
        </div>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>
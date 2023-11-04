<html lang="en">
<?php $this->view('includes/head') ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="bg-lightgray dis-flex ju-co-st al-it-st">
        <div class="dis-flex-col al-it-ce bg-trans wid-100 mar-10 bor-rad-5 over-hide">

            <div id="category-set" class="dis-flex bor-rad-10" style="border-radius: 100px; overflow: hidden; border: 2px solid var(--indigo-2)">
                <div id="cat-singer" class="pad-10 hover-pointer" style="border-right: 2px solid var(--indigo-2)">Singers</div>
                <div id="cat-band" class="pad-10 hover-pointer" style="border-right: 2px solid var(--indigo-2)">Bands</div>
                <div id="cat-venue" class="pad-10 hover-pointer">Venues</div>
            </div>

            <div class="bg-lightgray txt-c-black pad-10 wid-100 flex-1 dis-flex-col gap-10">
                <?php

                    foreach ($ad_singer as $ad) {
                        $this->view('includes/ad-s', (array)$ad);
                    }

                    foreach ($ad_band as $ad) {
                        $this->view('includes/ad-b', (array)$ad);
                    }

                    foreach ($ad_venue as $ad) {
                        $this->view('includes/ad-v', (array)$ad);
                    }
                ?>
            </div>
        </div>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>
<html lang="en">
<?php $this->view('includes/head', ['style' => 'components/ads.css']) ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main wid-100">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="cols-10 dis-flex flex-wrap pad-20 gap-10 wid-80">

                <?php

                    // Merging the category separated ads(arrays) to a single array
                    $ads = [];
                    if(!empty($ad_singer)) $ads = array_merge_recursive($ads, $ad_singer);
                    if(!empty($ad_band)) $ads = array_merge_recursive($ads, $ad_band);
                    if(!empty($ad_venue)) $ads = array_merge_recursive($ads, $ad_venue);

                    foreach ($ads as $ad) {
                        $this->view('includes/components/ad', (array)$ad);
                    }

                ?>

            </section>
        </main>
    </div>
</body>
</html>
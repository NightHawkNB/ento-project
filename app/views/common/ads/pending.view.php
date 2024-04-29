<html lang="en">
<?php $this->view('includes/head', ['style' => ['components/ads.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 dis-flex flex-wrap pad-20 gap-10 wid-80">

            <?php

//                show($data);
//                show($_SESSION['USER_DATA']->user_id);

                // Merging the category separated ads(arrays) to a single array
                $ads = [];
                if(!empty($ad_singer)) $ads = array_merge_recursive($ads, $ad_singer);
                if(!empty($ad_band)) $ads = array_merge_recursive($ads, $ad_band);
                if(!empty($ad_venue)) $ads = array_merge_recursive($ads, $ad_venue);
                if(!empty($ad_eventm)) $ads = array_merge_recursive($ads, $ad_eventm);

                if(empty($ads)) echo "No ads to show";
                else {
                    foreach ($ads as $ad) {
                        $this->view('pages/advertisements/components/ad', (array)$ad);
                    }
                }

            ?>

        </section>
    </main>
</div>
</body>
</html>
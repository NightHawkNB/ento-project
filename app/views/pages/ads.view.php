<html lang="en">
<?php $this->view('includes/head', ['style' => 'components/ads.css']) ?>
<body>

<style>
    .ad-container {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
    }

    .ad-container .ad-sub-container {
        padding: 10px;
        flex: 1;
        display: flex;
        gap: 10px;
        justify-content: left;
        align-items: baseline;
        flex-wrap: wrap;
    }

    @media screen and (min-width: 1350px) {
        .ad-container .ad-sub-container {
            max-width: 1350px;
        }
    }

    @media screen and (min-width: 1030px) and (max-width: 1350px) {
        .ad-container .ad-sub-container {
            max-width: 1015px;
        }
    }

    @media screen and (min-width: 700px) and (max-width: 1030px) {
        .ad-container .ad-sub-container {
            max-width: 680px;
        }
    }

    @media screen and (max-width: 700px) {
        .ad-container .ad-sub-container {
            max-width: 345px;
        }
    }

</style>

<div class="main-wrapper">
    <?php $this->view('includes/header') ?>
    <main class="dis-flex ju-co-st al-it-st">
        <div class="ad-container">

            <div class="ad-sub-container">
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
            </div>
        </div>
    </main>

    <?php $this->view('includes/footer') ?>
</div>
</body>
</html>
<html lang="en">
<?php $this->view('includes/head') ?>
<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>
            <section class="dis-flex-col pad-20 gap-10 cols-10 wid-80">

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

                    if(empty($ad_venue) && empty($ad_singer) && empty($ad_band)) echo "No ads to show";
                ?>
                
            </section>
        </main>
    </div>
</body>
</html>
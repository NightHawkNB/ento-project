<html lang="en">
<?php $this->view('includes/head') ?>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-10 dis-flex ju-co-st al-it-st">
            <div class="wid-100 pad-10 gap-10 bor-rad-5 dis-flex-col ju-co-ce al-it-ce gap-20">

                <h2>Choose Singers</h2>

                <form method="post" class="pad-10 wid-100 bor-rad-5 dis-flex ju-co-ce al-it-ce">
                    <style>
                        @media only screen and (min-width: 1000px) {
                            form > div{
                                min-width: 800px;
                                max-width: 800px;
                            }
                        }

                        /*@media only screen and (max-width: 1000px) {*/
                        /*    form > div{*/
                        /*        min-width: 200px;*/
                        /*        max-width: 200px;*/
                        /*    }*/
                        /*}*/
                    </style>
                    <div class="dis-flex-col gap-20 pad-20 ju-co-ce al-it-ce flex-wrap txt-c-black" style="overflow-y: scroll; overflow-x: inherit">

                        <?php
                        if(!empty($ads)) {
                            foreach($ads as $ad) {
                                $this->view('includes/ad-component-2', (array)$ad);
                            }
                        } else {
                            echo "<h4> No Ads to show... </h4>";
                        }
                        ?>

                    </div>
                </form>

                <div class="wid-100 dis-flex ju-co-ce al-it-ce gap-20">
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/4">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal">Back</span>
                    </a>
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/2">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal">Next</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
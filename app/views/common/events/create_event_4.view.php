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

                <h2>Choose a Band</h2>

                <form method="post" class="pad-10 wid-100 bor-rad-5 dis-flex ju-co-ce al-it-ce">
                    <style>
                        @media only screen and (min-width: 1000px) {
                            form > div{
                                min-width: 800px;
                                max-width: 800px;
                            }
                        }

                        @media only screen and (max-width: 1000px) {
                            form > div{
                                min-width: 200px;
                                max-width: 200px;
                            }
                        }
                    </style>
                    <div class="dis-flex-col gap-20 ju-co-ce al-it-ce flex-wrap txt-c-black">

                        <?php
                        foreach($ads as $ad) {
                            $this->view('includes/ad-component-2', (array)$ad);
                        }
                        ?>

                    </div>
                </form>

                <div class="wid-100 dis-flex ju-co-ce al-it-ce gap-20">
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/3">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal">Back</span>
                    </a>
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/5">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal">Next</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
<html lang="en">
<?php $this->view('includes/head') ?>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 ">
            <div class="mar-20 bg-white txt-c-black bor-rad-5 wid-90 sh f-poppins hei-90 dis-flex">
                <div class="dis-flex-col wid-50">

                    <div class="txt-c-purple mar-20">
                        <p class="txt-w-bolder " style="font-size:30px; text-align: center"><?= $ads[0]->title ?></p>
                    </div>

                    <div class="pad-20 ">
                        <img src="<?= $ads[0]->image ?>" alt="Advertisement Image" style="height: 90%; width:100%; border: 3px solid #9e54fa">
                    </div>

                </div>
                <div class="dis-flex-col mar-20" style="margin-top: 100px">
                    <div class="bor-1-sol-purple pad-20 bor-rad-5 ju-co-se" style="height: fit-content">

                        <div class="txt-c-black " style="margin-bottom: 20px;">
                            <p class="txt-w-bolder">ID : <?= $ads[0]->ad_id ?></p>
                        </div>

                        <div class="txt-c-black" style="margin-bottom: 20px;">
                            <p class="txt-w-bold">Date and Time : <?= $ads[0]->datetime ?></p>
                        </div>

                        <!-- Show other details similarly -->
                        <div class="txt-c-black" style="margin-bottom: 20px;">
                            <p class="txt-w-bold">By  : <?=$ads[0]->fname ?><?=$ads[0]->lname ?></p>
                        </div>

                        <div class="txt-c-black" style="margin-bottom: 20px;">
                            <p class="txt-w-bold">Comment : <?= $ads[0]->details ?></p>
                        </div>

                        <div class="txt-c-black" style="margin-bottom: 20px;">
                            <p class="txt-w-bold">User ID : <?= $ads[0]->user_id  ?></p>
                        </div>

                        <div class="txt-c-black" style="margin-bottom: 20px;">
                            <p class="txt-w-bold"> Contact : <?= $ads[0]->contact_num  ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>

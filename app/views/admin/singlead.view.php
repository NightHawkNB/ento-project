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
            <div class="bg-white hei-90 dis-flex-col bor-rad-10 wid-60 mar-20 pad-20" style="margin-left: 200px">
                <div class=" dis-flex" style="height: 15%">
                    <div class="" style="width: 70%">
                        <div class="" style="height: 25%">
                            < Back
                        </div>
                        <div class="" style="height: 50%">
                            <p class="txt-w-bolder" style="font-size: 30px "><?= $ads[0]->title ?></p>
                        </div>
                        <div class="" style="height: 25%">
                            <p class="txt-ali-lef txt-d-none" style=" "><?= $ads[0]->datetime ?> |  <?= $ads[0]->category ?></p>
                        </div>
                    </div>
                    <div class="dis-flex-col ju-co-se pad-10" style="width: 50%;align-items: flex-end">
                        <a href="<?= ROOT ?>/admin/adverify"  >
                            <button class="blue-btn" style="width: 150px; text-align: center">
                                Verify
                            </button>
                        </a>
                        <a href="<?= ROOT ?>/admin/adverify"  >
                            <button class="blue-btn" style="width:150px; text-align: center ">
                                Decline
                            </button>
                        </a>
                    </div>
                </div>
                <div class="" style="height: 55%; overflow: hidden;">
                    <img src="<?= $ads[0]->image ?>" alt="Advertisement Image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px; padding: 5px;">
                </div>
                <div class=" dis-flex" style="height: 30%">
                    <div class="" style="width: 50%">
                        <div class="txt-w-bolder" style="height:20%; font-size:20px; padding:5px;">
                            Description
                        </div>
                        <div class="" style="height:80%; padding:5px; text-align: justify;"">
                            Amidst the ge finds solace. The world seems to slow down, embracing a serene rhythm that resonates with the beating of the heart. Each moment, a canvas painted with the hues of tranquility, invites us to pause and appreciate the beauty that surrounds us. In the quiet embrace of such moments, we often discover the profound magic hidden within simplicity
                        </div>
                    </div>
                    <div class="bg-lightgray pad-20 mar-20 bor-rad-10" style="width: 50%">
                        <div class="" style="height: 30%" >
                            <p class="txt-ali-cen" style="font-size: 20px;"><?= $ads[0]->fname ?> <?= $ads[0]->lname ?></p>
                        </div>
                        <div class="dis-flex pad-10" style="height: 35%">
                            <p class="">Contact:</p>
                        </div>
                        <div class="dis-flex pad-10" style="height: 35%">
                            <div class="" style="width:50%">
                                <p class="txt-w-bold"><?= $ads[0]->contact_num ?></p>
                            </div>
                            <div class="" style="width:50%">
                                <p class="txt-w-bold"><?= $ads[0]->contact_email ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>

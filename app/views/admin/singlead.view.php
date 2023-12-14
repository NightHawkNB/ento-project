<html lang="en">
<?php $this->view('includes/head') ?>

<body>
    <div class="main-wrapper">
        <?php $this->view('includes/header') ?>

        <main class="dashboard-main">
            <section class="cols-2 sidebar">
                <?php $this->view('includes/sidebar') ?>
            </section>

            <section class="cols-10 dis-flex">
                <div class="bg-black-2 mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content: stretch; align-items: stretch;">
                    <div class="flex-1 dis-flex-col gap-10 mar-bot-10 mar-top-10">
                        <div class="bg-white txt-c-black pad-10-20 bor-rad-5 wid-100 sh f-poppins">
                            <div class="txt-c-black dis-flex-col gap-10">
                                <p class="txt-w-bold"> AD ID : <?= $ads[0]->ad_id ?></p> 
                            </div>

                            <div class="dis-flex-col txt-c-black gap-10">
                                <p class="txt-w-bold">Date and Time : <?= $ads[0]->datetime ?></p>   
                            </div>

                            <!-- Show other details similarly -->
                            <div class="dis-flex-col txt-c-black gap-10">
                                <p class="txt-w-bold">From  : <?=$ads[0]->fname ?><?=$ads[0]->lname ?></p>
                            </div>

                            <div class="dis-flex-col txt-c-black gap-10">
                                <p class="txt-w-bold">Comment : <?= $requests[0]->comment ?></p>
                            </div>

                            <div class="dis-flex-col txt-c-black gap-10">
                                <p class="txt-w-bold">CCA : <?= $requests[0]->cust_id ?></p>
                            </div>

                            <div class="dis-flex-col txt-c-black gap-10">
                                <p class="txt-w-bold">User ID : <?= $requests[0]->user_id  ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>
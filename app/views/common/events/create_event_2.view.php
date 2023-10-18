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
            <div class="bg-primary wid-100 pad-10 gap-10 bor-rad-5 dis-flex">
                <form method="post" class="pad-10 wid-100 bor-rad-5">
                    <fieldset class="pad-10 bor-rad-5 dis-flex-col">
                        <legend class="p-0-10">General Details</legend>

                        <div class="dis-flex gap-10 flex-wrap al-it-ce">
                            <div class="dis-flex gap-10 al-it-ce">
                                <label for="name" class="min-w-100">Name : </label>
                                <input class="input txt-ali-cen flex-1" type="text" id="name" name="name" placeholder="Enter the Event Name">
                            </div>
                            <div class="dis-flex gap-10 al-it-ce">
                                <label for="desc" class="min-w-100">Description : </label>
                                <textarea class="input wid-100 flex-1" id="desc" name="desc"></textarea>
                            </div>
                            <div class="dis-flex gap-10 al-it-ce ju-co-ce">
                                <div class="dis-flex gap-10 al-it-ce">
                                    <label for="district" class="min-w-100">District : </label>
                                    <input class="input txt-ali-cen flex-1" type="text" id="district" name="location" placeholder="Enter the District">
                                </div>
                                <div class="dis-flex gap-10 al-it-ce">
                                    <label for="datetime" class="min-w-100">Date / Time : </label>
                                    <input class="input txt-ali-cen flex-1" type="datetime-local" id="datetime" name="datetime" placeholder="Enter the District">
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/3" class="mar-10-auto min-w-150"><span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal min-w-150">Next</span></a>
                </form>
            </div>
        </section>
    </main>
</div>
</body>
</html>
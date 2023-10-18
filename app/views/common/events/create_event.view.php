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

                        <fieldset class="pad-10 bor-rad-5 gap-10 dis-flex-col">
                            <legend class="p-0-10">Ticketing Details</legend>

                            <div class="dis-flex gap-20 al-it-ce">
                                <div class="dis-flex gap-10 al-it-ce">
                                    <label for="price1" class="min-w-100">Ticket type 01 : </label>
                                    <input class="input txt-ali-cen flex-1" type="number" id="price1" name="price1" placeholder="Enter the Price">
                                </div>
                                <div class="dis-flex gap-10 al-it-ce">
                                    <label for="price2" class="min-w-100">Ticket type 02 : </label>
                                    <input class="input txt-ali-cen flex-1" type="number" id="price2" name="price2" placeholder="Enter the Price">
                                </div>
                                <div class="dis-flex gap-10 al-it-ce">
                                    <label for="price3" class="min-w-100">Ticket type 03 : </label>
                                    <input class="input txt-ali-cen flex-1" type="number" id="price3" name="price3" placeholder="Enter the Price">
                                </div>
                            </div>

                            <div class="dis-flex gap-20 al-it-ce">
                                <div class="dis-flex gap-10 al-it-ce">
                                    <label for="count1" class="min-w-100">Type 01 Count : </label>
                                    <input class="input txt-ali-cen flex-1" type="number" id="count1" name="count1" placeholder="Enter the Count">
                                </div>
                                <div class="dis-flex gap-10 al-it-ce">
                                    <label for="count2" class="min-w-100">Type 01 Count : </label>
                                    <input class="input txt-ali-cen flex-1" type="number" id="count2" name="count2" placeholder="Enter the Count">
                                </div>
                                <div class="dis-flex gap-10 al-it-ce">
                                    <label for="count3" class="min-w-100">Type 01 Count : </label>
                                    <input class="input txt-ali-cen flex-1" type="number" id="count3" name="count3" placeholder="Enter the Count">
                                </div>
                            </div>

                        </fieldset>

                        <fieldset class="pad-10 bor-rad-5 gap-10 dis-flex-col">
                            <legend class="p-0-10">Media Files</legend>

                            <div class="dis-flex gap-20 al-it-ce">
                                <div>
                                    <div class="dis-flex gap-10 al-it-ce">
                                        <label for="cover-banner" class="">Banner Image : </label>
                                        <input class="input txt-ali-cen flex-1" type="file" id="cover-banner" name="cover-banner">
                                    </div>
                                    <div class="dis-flex gap-10 al-it-ce">
                                        <label for="cover" class="">Cover Image : </label>
                                        <input class="input txt-ali-cen flex-1" type="file" id="cover" name="cover">
                                    </div>
                                    <div class="dis-flex gap-10 al-it-ce">
                                        <label for="cover-banner" class="">Venue Image : </label>
                                        <input class="input txt-ali-cen flex-1" type="file" id="cover-banner" name="cover-banner" placeholder="Upload Banner">
                                    </div>
                                </div>
                                <div>
                                    <div class="dis-flex gap-10 al-it-ce">
                                        <label for="cover-banner" class="">Band Image : </label>
                                        <input class="input txt-ali-cen flex-1" type="file" id="cover-banner" name="cover-banner" placeholder="Upload Banner">
                                    </div>
                                    <div class="dis-flex gap-10 al-it-ce">
                                        <label for="cover-banner" class="">Singer 01 Image : </label>
                                        <input class="input txt-ali-cen flex-1" type="file" id="cover-banner" name="cover-banner" placeholder="Upload Banner">
                                    </div>
                                    <div class="dis-flex gap-10 al-it-ce">
                                        <label for="cover-banner" class="">Singer 02 Image : </label>
                                        <input class="input txt-ali-cen flex-1" type="file" id="cover-banner" name="cover-banner" placeholder="Upload Banner">
                                    </div>
                                </div>
                            </div>

                        </fieldset>

                        <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/2" class="mar-10-auto min-w-150"><span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal min-w-150">Next</span></a>
                    </form>
            </div>
        </section>
    </main>
</div>
</body>
</html>
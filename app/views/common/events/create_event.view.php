<html lang="en">
<?php $this->view('includes/head') ?>

<style>
    input[type=file] {
        border: none;
    }

    #svg-01 {
        height: 1.4rem;
    }

    .add-btn {
        height: 40px;
        width: 40px;
        padding: 10px;
        border-radius: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 1s ease;
        bottom: 20px;
        right: 20px;
        position: absolute;
        z-index: 1;
    }

    .add-btn:hover {
        transform: rotate(90deg);
    }
</style>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-10 dis-flex ju-co-st al-it-st">
            <div class="bg-white wid-100 pad-10 bor-rad-5 dis-flex-col ju-co-ce al-it-ce gap-20">
                    <form method="post" class="bg-lightgray txt-c-black over-hide bor-rad-5">

                        <div class="pos-rel wid-100">
                            <img src="<?= ROOT ?>/assets/images/events/event-01.cover.jpeg" class="wid-100 " alt="event-01 cover">
                            <div class="add-btn bg-white hover-pointer">
                                <label for="cover-banner" style="cursor:pointer;" class="">
                                    <svg id="svg-01" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
                                </label>
                                <input class="input txt-ali-cen flex-1 hide" type="file" id="cover-banner" name="cover-banner">
                            </div>
                        </div>

                        <div class="pad-10">
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

                            <div class="dis-flex gap-20 al-it-ce">
                                <div>
                                    <div class="dis-flex gap-10 al-it-ce">

                                    </div>
                                    <div class="dis-flex gap-10 al-it-ce">
                                        <label for="cover" class="">Cover Image : </label>
                                        <input class="input txt-ali-cen flex-1" type="file" id="cover" name="cover">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>

                    <div class="wid-100 dis-flex ju-co-ce">
                        <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/2">
                            <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal min-w-150">Next</span>
                        </a>
                    </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
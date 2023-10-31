<html lang="en">
<?php $this->view('includes/head') ?>

<style>
    body {
        font-family: Poppins;
    }

    input {
        height: 30px;
        text-align: center;
        border: none;
    }

    input:focus {
        text-align: left;
    }

    img {
        padding-bottom: 10px;
    }

    label {
        padding-bottom: 5px;
    }

    form div > div {
        transition: 1s;
    }

    form div > div:hover {
        background-color: var(--indigo-6);
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
            <div class=" wid-100 pad-10 gap-10 bor-rad-5 dis-flex-col ju-co-ce al-it-ce gap-20">

                <h2>Ticketing Plan</h2>

                <form method="post" class="pad-10 wid-100 bor-rad-5">
                    <div class="dis-flex gap-20 ju-co-ce al-it-ce flex-wrap">
                        <div class="bg-lightgray pad-10 pad-10 bor-rad-5 sh dis-flex-col al-it-ce gap-10" style="max-width: 200px">
                            <img src="<?= ROOT ?>/assets/images/events/dev/basic.svg" style="width: 130px; height: 130px" alt="basic package">

                            <h3 class="txt-c-black">Basic</h3>

                            <div class="txt-c-black">
                                <label for="name1">Name</label>
                                <input class="input" type="text" id="name1" name="name1" placeholder="--Package Name--">
                            </div>

                            <div class="txt-c-black">
                                <label for="price1">Price</label>
                                <input class="input" type="text" id="price1" name="price1" placeholder="--Ticket Price--">
                            </div>

                            <div class="txt-c-black">
                                <label for="count1">Count</label>
                                <input class="input" type="text" id="count1" name="count1" placeholder="--Ticket Count--">
                            </div>
                        </div>

                        <div class="bg-lightgray pad-10 pad-10 bor-rad-5 sh dis-flex-col al-it-ce gap-10" style="max-width: 200px">
                            <img src="<?= ROOT ?>/assets/images/events/dev/intermediate.svg" style="width: 130px; height: 130px" alt="basic package">

                            <h3 class="txt-c-black">Intermediate</h3>

                            <div class="txt-c-black">
                                <label for="name2">Name</label>
                                <input class="input" type="text" id="name2" name="name2" placeholder="--Package Name--">
                            </div>

                            <div class="txt-c-black">
                                <label for="price2">Price</label>
                                <input class="input" type="text" id="price2" name="price2" placeholder="--Ticket Price--">
                            </div>

                            <div class="txt-c-black">
                                <label for="count2">Count</label>
                                <input class="input" type="text" id="count2" name="count2" placeholder="--Ticket Count--">
                            </div>
                        </div>

                        <div class="bg-lightgray pad-10 pad-10 bor-rad-5 sh dis-flex-col al-it-ce gap-10" style="max-width: 200px">
                            <img src="<?= ROOT ?>/assets/images/events/dev/advanced.svg" style="width: 130px; height: 130px" alt="basic package">

                            <h3 class="txt-c-black">Advanced</h3>

                            <div class="txt-c-black">
                                <label for="name3">Name</label>
                                <input class="input" type="text" id="name3" name="name3" placeholder="--Package Name--">
                            </div>

                            <div class="txt-c-black">
                                <label for="price3">Price</label>
                                <input class="input" type="text" id="price3" name="price3" placeholder="--Ticket Price--">
                            </div>

                            <div class="txt-c-black">
                                <label for="count3">Count</label>
                                <input class="input" type="text" id="count3" name="count3" placeholder="--Ticket Count--">
                            </div>
                        </div>

                        <div class="bg-lightgray pad-10 pad-10 bor-rad-5 sh dis-flex-col ju-co-ce al-it-ce gap-10" style="max-width: 200px; height: 100%">
                            <img src="<?= ROOT ?>/assets/images/events/dev/add.svg" style="width: 130px; height: 130px" alt="basic package">
                            <h3 class="txt-c-black">Add New</h3>
                        </div>
                    </div>
                </form>

                <div class="wid-100 dis-flex ju-co-ce gap-20">
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/5">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal min-w-150">Back</span>
                    </a>
                    <a href="<?= ROOT ?>/<?= strtolower($_SESSION['USER_DATA']->user_type) ?>/event/confirm">
                        <span class="btn-lay-2 btn-anima-hover f-space-2 txt-w-normal min-w-150">Next</span>
                    </a>
                </div>
            </div>
        </section>
    </main>
</div>
</body>
</html>
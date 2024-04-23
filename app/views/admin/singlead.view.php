<html lang="en">
<?php $this->view('includes/head') ?>


<style>


    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(1);
        background-color: #a0d8ee;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        z-index: 5;
        width: auto;
    }

    .popup.active{
        display: flex;
    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 4;
    }

    .button-close {
        padding: 10px 40px;
        margin: 5px;
        background: #7b51d3;
        color: var(--font-secondary);
        border-radius: 5px;
        max-height: fit-content;
        border: none;
        outline: none;
        transition: 0.3s;
        width: fit-content;
        cursor: pointer;
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 10px;
        font-size: 1.2rem;
        cursor: pointer;
        color: red;
        font-weight: bolder;
    }


</style>


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
                        <div class="" style="height: 30%">
                            <a href="<?= ROOT ?>/admin/adverify">
                                <button class="back-btn " onclick="goBack()" style="width: 50px; text-align: center">
                                    < Back
                                </button>
                            </a>
                        </div>
                        <div class="" style="height: 50%">
                            <p class="txt-w-bolder" style="font-size: 30px "><?= $ads[0]->title ?></p>
                        </div>
                        <div class="" style="height: 25%">
                            <p class="txt-ali-lef txt-d-none" style=" "><?= $ads[0]->datetime ?>
                                | <?= $ads[0]->category ?></p>
                        </div>
                    </div>
                    <div class="dis-flex-col ju-co-se  " style="width: 50%;align-items: flex-end">
                        <a href="<?= ROOT ?>/admin/adverify/<?= $ads[0]->ad_id ?>/verify">
                            <button class="blue-btn " style="width: 150px; text-align: center">
                                Verify
                            </button>
                        </a>
                        <button class="blue-btn" type="button" onclick="openPopup()" style="width:150px; text-align: center ">
                            Decline
                        </button>
                    </div>
                </div>
                <div class="" style="height: 55%; overflow: hidden;">
                    <img src="<?= ROOT . $ads[0]->image ?>" alt="Advertisement Image"
                         style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px; padding: 5px;">
                </div>
                <div class=" dis-flex" style="height: 30%">
                    <div class="" style="width: 50%">
                        <div class="txt-w-bolder mar-20" style="height:20%; font-size:20px; padding:5px;">
                            Description
                        </div>
                        <div class="" style="height:80%; padding:5px; text-align: justify;"
                        ">
                        <p class="txt-ali-cen" style=""><?= $ads[0]->details ?> </p>
                    </div>
                </div>
                <div class=" pad-20 mar-20 bor-rad-10" style=" background-color: #E8E9FF;width: 50%">
                    <div class="" style="height: 30%;">
                        <p class="txt-ali-cen" style="font-size: 20px;"><?= $ads[0]->fname ?> <?= $ads[0]->lname ?></p>
                    </div>
                    <div class="dis-flex pad-10 ju-co-ce" style="height: 35%">
                        <p class="">Contact:</p>
                    </div>
                    <div class="dis-flex-col pad-10" style="height: 35%">
                        <div class="dis-flex ju-co-ce" style="">
                            <p class="txt-w-bold"><?= $ads[0]->contact_num ?></p>
                        </div>
                        <div class="dis-flex ju-co-ce" style="">
                            <p class="txt-w-bold"><?= $ads[0]->contact_email ?></p>
                        </div>
                    </div>
                </div>


                <div id="declinePopup" class="popup dis-flex-col">
                    <form id="decline-reason" method="POST" action="<?=ROOT.'/admin/adverify/'.$ads[0]->ad_id.'/decline'?>">
                        <span class="close-button" onclick="closePopup()"> X </span>
                        <p style="color: black; font-weight: bold">Reason for Decline</p>
                        <textarea id="declineComment" name="declineComment" cols="30" rows="10"></textarea>
                        <button class="button-close" style="align-self: flex-end" >Save</button>
                    </form>
                </div>

                <div id="overlay" class="overlay" onclick="closePopup()"></div>

                <script>
                    // Function to open the decline popup
                    function openPopup() {
                        const popup = document.querySelector('#declinePopup');
                        const overlay = document.querySelector('#overlay');
                        popup.classList.add('active');
                        overlay.style.display = 'flex';
                    }

                    // Function to close the popup
                    function closePopup() {
                        const popup = document.querySelector('#declinePopup');
                        const overlay = document.querySelector('#overlay');
                        popup.classList.remove('active');
                        overlay.style.display = 'none';
                    }
                </script>

            </div>
        </section>
    </main>
</div>
</body>
</html>

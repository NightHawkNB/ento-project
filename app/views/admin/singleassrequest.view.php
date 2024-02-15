<?=show($data['requests'])?>

<html lang="en">
<?php $this->view('includes/head') ?>

<style>
    .bordered-div {
        border: 2px solid black;
        border-radius: 5px;
        margin: 10px 0px 10px 0px;
    }

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
        width: 140px;
    }

</style>

<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>

    <main class="dashboard-main">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>

        <section class="cols-10 dis-flex">
            <div class="mar-10 wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content: stretch; align-items: stretch;">
                <div class="bg-white hei-90 dis-flex-col bor-rad-10 wid-80 mar-20 pad-20" style="margin-left: 150px">
                    <div class="bg-grey go-6 dis-flex-col" style="height:50%">
                        <div class="" style="background-color: #ffffff ;height: 25%">
                            <div class="dis-flex">
                                <div class="" style="width:50%; background-color: #ffffff">
                                    <a href="<?= ROOT ?>/admin/ccareq" >
                                        <button class="back-btn " style="width: 50px; text-align: center">
                                            < Back
                                        </button>
                                    </a>
                                </div>
                                <div class="" style="width:50%; background-color: #ffffff">
                                    <p class="txt-ali-rig txt-d-none pad-10" style="font-weight: bold; font-size: 1.2rem; color: #de2a2a;">Assistance Pending</p>
                                </div>
                            </div>
                        </div>
                        <div class="" style="background-color: #ffffff; height: 15%">
                            <p class="txt-ali-lef txt-d-none " style=" "><?= $requests[0]->assist_date_time ?> |  CCA ID : 453687</p>
                        </div>
                        <div class="dis-flex-col" style="background-color: #ffffff; height: 35%">
                            <div class="" style="height:10%">
                                <p class="txt-ali-lef txt-d-none " style=" ">Comment : </p>
                            </div>
                            <div class="bordered-div pad-10" style="height: 90%; margin: 10px 0px 10px 0px;">
                                <p class="txt-ali-lef txt-d-none " style=" "> <?= $requests[0]->comment ?></p>
                            </div>
                        </div>
                        <div class="dis-flex ju-co-se"  style="background-color: #ffffff; height: 25%;align-items: center">
                            <button class="button-s2" type="button" onclick="openPopup()" style="width: 150px; text-align: center">
                                Todo
                            </button>
                            <a href=" ">
                                <button class="button-s2" style="width:150px; text-align: center ">
                                    Handled
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="bordered-div dis-flex-col" style="height: 50% ; ">
                        <div class="" style="background-color: #ffffff ;height: 15%">
                            <p class="txt-ali-lef txt-d-none pad-10" style=" ">Complaint ID : <?= $requests[0]->assist_comp_id ?></p>
                        </div>
                        <div class="dis-flex " style="height: 15%">
                            <div class="dis-flex pad-10" style="background-color: #ffffff ; width: 50%">
                                <p class="txt-ali-lef txt-d-none" style=" "><?= $requests[0]->complaint_date_time ?></p>
                            </div>
                            <div class="dis-flex pad-10" style="background-color: #ffffff ;width: 50%">
                                <p class="txt-ali-lef txt-d-none" style=" ">User ID : <?= $requests[0]->user_id ?></p>
                            </div>
                        </div>
                        <div class="bordered-div pad-10" style="background-color: #ffffff ;height: 45%; margin: 10px 10px 10px 10px;">
                            <p class="txt-ali-lef txt-d-none" style=" "><?= $requests[0]->details ?></p>
                        </div>
                        <div class="dis-flex pad-10" style="background-color: #ffffff ;height: 25%">
                            <div class="" style="width:5%">
                                <p class="txt-ali-lef txt-d-none " style=" ">Files : </p>
                            </div>
                            <div class="bordered-div pad-10 " style="width: 95%; margin: 0px 10px 10px 10px;height: 90%;">
                                <p class="txt-ali-lef txt-d-none " style=" ">hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="popup" class="popup dis-flex-col">
                    <p style="color: black; font-weight: bold">Comment</p>
                    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                    <button class="button-close" style="align-self: flex-end" onclick="closePopup()">Save</button>
                </div>

                <!-- Overlay -->
                <div id="overlay" class="overlay"></div>

                <script>


                    // Function to open the popup
                    function openPopup() {
                        const pop = document.querySelector('.popup')
                        const overlay = document.querySelector('.overlay')
                        pop.classList.toggle('active')
                        overlay.style.display = 'flex'
                    }

                    // Function to close the popup
                    function closePopup() {
                        const pop = document.querySelector('.popup')
                        const overlay = document.querySelector('.overlay')
                        pop.classList.toggle('active')
                        overlay.style.display = 'none'
                    }
                </script>
            </div>
        </section>
    </main>
</div>
</body>
</html>






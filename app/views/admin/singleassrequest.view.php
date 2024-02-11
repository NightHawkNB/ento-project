<?=show($data['requests'])?>

<html lang="en">
<?php $this->view('includes/head') ?>

<style>
    .bordered-div {
        border: 2px solid black;
        border-radius: 5px;
        margin: 10px 0px 10px 0px;
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
                            <p class="txt-ali-lef txt-d-none " style=" "><?= $requests[0]->date_time ?> |  CCA ID : 453687</p>
                        </div>
                        <div class="dis-flex-col" style="background-color: #ffffff; height: 35%">
                            <div class="" style="height:10%">
                                <p class="txt-ali-lef txt-d-none " style=" ">Comment : </p>
                            </div>
                            <div class="bordered-div pad-10" style="height: 90%; margin: 10px 0px 10px 0px;">
                                <p class="txt-ali-lef txt-d-none " style=" "> <?= $requests[0]->comment ?></p>
                            </div>
                        </div>
                        <div class="dis-flex ju-co-se" style="background-color: #ffffff; height: 25%;align-items: center">
                            <a href="" >
                                <button class="button-s2 " style="width: 150px; text-align: center">
                                    Assisting
                                </button>
                            </a>
                            <a href=" ">
                                <button class="button-s2" style="width:150px; text-align: center ">
                                    Handled
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="bordered-div dis-flex-col" style="height: 50% ; ">
                        <div class="" style="background-color: #ffffff ;height: 15%">
                            <p class="txt-ali-lef txt-d-none pad-10" style=" ">Complaint ID : <?= $requests[0]->comp_id ?></p>
                        </div>
                        <div class="dis-flex " style="height: 15%">
                            <div class="dis-flex pad-10" style="background-color: #ffffff ; width: 50%">
                                <p class="txt-ali-lef txt-d-none" style=" ">02/05/2024 | 23:35</p>
                            </div>
                            <div class="dis-flex pad-10" style="background-color: #ffffff ;width: 50%">
                                <p class="txt-ali-lef txt-d-none" style=" ">User ID : 5268741</p>
                            </div>
                        </div>
                        <div class="bordered-div pad-10" style="background-color: #ffffff ;height: 45%; margin: 10px 10px 10px 10px;">
                            <p class="txt-ali-lef txt-d-none" style=" ">In response to the intricate challenges faced by students in comprehending and managing educational content, [Your Application Name] emerges as a sophisticated solution designed to revolutionize the learning experience. Specifically crafted to overcome the identified challenges, our application stands out with its multifaceted approach, integrating state-of-the-art technologies to provide a comprehensive suite of features.</p>
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
            </div>
        </section>
    </main>
</div>
</body>
</html>






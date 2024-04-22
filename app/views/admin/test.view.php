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

        <section class="cols-10 dis-flex">
            <div class="wid-100 dis-flex-col pad-20 gap-10 bor-rad-5" style="justify-content: center; align-items: center;">
                <div class="bg-white hei-100 dis-flex-col bor-rad-10 pad-20" style="overflow: auto; max-width: 800px;">
                    <div class="dis-flex-col" style="">
                       <div class="dis-flex" style="">
                           <div class="" style="width:50%;  background-color: #ffffff">
                               <button class="back-btn " onclick="goBack() " style="width: 50px; text-align: center">
                                   < Back
                               </button>
                           </div>
                           <div class="" style="width:50%; background-color: #ffffff">
                               <?php
                               $status = $requests[0]->status ;
                               $text = '';
                               $color = '';
                               switch ($status) {
                                   case 'Idle':
                                       $text = 'Assistance Pending';
                                       $color = 'txt-c-red';
                                       break;
                                   case 'Todo':
                                       $text = 'Assistance Todo';
                                       $color = 'txt-c-green';
                                       break;
                                   case 'Handled':
                                       $text = 'Assistance Handled';
                                       $color = 'txt-c-indigo-2';
                                       break;
                               }
                               ?>
                               <p class="txt-ali-rig txt-d-none pad-10 <?= $color ?>" style="font-weight: bold; font-size: 1.2rem;">
                                   <?= $text ?>
                               </p>
                           </div>
                       </div>
                        <div class="" style="background-color: #ffffff;">
                            <p class="txt-ali-lef txt-d-none " style=" "><?= $requests[0]->assist_date_time ?> | CCA ID : <?= $requests[0]->cca_user_id ?> </p>
                        </div>
                        <div class="pad-10 bor-rad-10" style=" margin: 10px 0px 10px 0px; background-color: #d8caf5 ">
                            <p class="txt-ali-lef txt-d-none " style=" ">Comment: <?= $requests[0]->cca_comment ?></p>
                        </div>
                        <?php if ($requests[0]->status === 'Todo'): ?>
                            <div class="pad-10 bor-rad-10" style=" margin: 10px 0px 10px 0px; background-color: #d8caf5 ">
                                <p class="txt-ali-lef txt-d-none " style=" ">Notes: <?= $requests[0]->assist_comment ?></p>
                            </div>
                        <?php endif; ?>
                        <div class="dis-flex ju-co-se"  style="background-color: #ffffff;align-items: center">
                            <?php if($requests[0]->status ==='Idle'):?>
                                <button class="button-s2" type="button" onclick="openPopup(1)" style="width: 150px; text-align: center">
                                    Todo
                                </button>
                                <button class="button-s2" type="button" onclick="openPopup(2)" style="width:150px; text-align: center ">
                                    Handled
                                </button>
                            <?php elseif ($requests[0]->status === "Todo"): ?>
                                <div style="margin-left: auto;">
                                    <button class="button-s2" type="button" onclick="openPopup(2)" style="width:150px;">
                                        Handled
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <hr class="mar-20">
                        <div class="txt-w-bolder txt-ali-cen pad-10" style="font-size: larger;">
                            Complaint Details
                        </div>
                    </div>
                    <div class="dis-flex-col" style="">
                        <div class="dis-flex " style="">
                            <div class="dis-flex pad-10" style="background-color: #ffffff ; width: 50%">
                                <p class="txt-ali-lef txt-d-none" style=" "><?= $requests[0]->complaint_date_time ?></p>
                            </div>
                            <div class="dis-flex pad-10" style="background-color: #ffffff ;width: 50%">
                                <p class="txt-ali-lef txt-d-none" style=" ">By User : <?= $requests[0]->username ?></p>
                            </div>
                        </div>
                        <div class="bordered-div pad-10 bor-rad-10" style="margin: 10px 10px 10px 10px; background-color:#d8caf5 ">
                            <p class="txt-ali-lef txt-d-none" style=" ">Details: <?= $requests[0]->details ?></p>
                        </div>
                        <?php if(!empty($requests[0]->files)): ?>
                            <div class="pad-10" style="">
                                <p class="txt-ali-lef txt-d-none " style=" ">Files : </p>
                            </div>
                            <div class="pad-10" style="display: flex; justify-content: space-between; gap: 10px">
                                <img style="width: 50%" src="<?=ROOT.$requests[0]->files?>" alt="image">
                                <img style="width: 50%" src="<?=ROOT.$requests[0]->files?>" alt="image">
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <form id="commentForm1" method="POST" action="<?=ROOT.'/admin/ccareq/'.$requests[0]->assist_comp_id.'/todo'?>">
                    <div id="popup1" class="popup dis-flex-col">
                        <span class="close-button" onclick="closePopup(1)"> X </span>
                        <p style="color: black; font-weight: bold">Comment</p>
                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                        <button class="button-close" style="align-self: flex-end" onclick="closePopup(1)">Save</button>
                    </div>
                </form>

                <form id="commentForm2" method="POST" action="<?=ROOT.'/admin/ccareq/'.$requests[0]->assist_comp_id.'/handled'?>">
                    <div id="popup2" class="popup dis-flex-col">
                        <span class="close-button" onclick="closePopup(2)"> X </span>
                        <p style="color: black; font-weight: bold">Comment</p>
                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                        <button class="button-close" style="align-self: flex-end" onclick="closePopup(2)">Save</button>
                    </div>
                </form>


                <!-- Overlay -->
                <div id="overlay" class="overlay"></div>

                <script>


                    // Function to open the popup
                    function openPopup(value) {
                        const pop = (value === 1)  ? document.querySelector('#popup1'):document.querySelector('#popup2')
                        const overlay = document.querySelector('.overlay')
                        pop.classList.toggle('active')
                        overlay.style.display = 'flex'
                    }

                    // Function to close the popup
                    function closePopup(id) {
                        const pop = (id === 1) ? document.querySelector('#popup1') : document.querySelector('#popup2')
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
<!--<html lang="en">-->
<?php //$this->view('includes/head',['style' => ['cca/verifydetails.css']]) ?>
<!--<body>-->
<!--<div class="main-wrapper">-->
<!--    --><?php //$this->view('includes/header') ?>
<!--    <main class="dashboard-main ">-->
<!--        <section class="cols-2 sidebar">-->
<!--            --><?php //$this->view('includes/sidebar') ?>
<!--        </section>-->
<!--        <section class="cols-10 pad-20 dis-flex wid-100 hei-100 ju-co-ce al-it-ce">-->
<!--            <div class="verify-container">-->
<!--                <div class="form" style="width: 100%">-->
<!--                    <h2>User Details</h2>-->
<!--                    <div class="content">-->
<!--                        <div class="left">-->
<!--                            <div class="input-box">-->
<!--                                <label>Full Name</label>-->
<!--                                <div class="input-like">--><?php //= $assists->fname." ".$assists->lname ?><!-- </div>-->
<!--                            </div>-->
<!--                            <div class="input-box">-->
<!--                                <label>Address</label>-->
<!--                                <div class="input-like">--><?php //= $assists->address1.", ".$assists->address2.", ".$assists->province.", ".$assists->district ?><!-- </div>-->
<!--                            </div>-->
<!--                                <div class="input-box">-->
<!--                                    <label>Nic</label>-->
<!--                                    <div class="input-like">--><?php //= $assists->nic_num?><!-- </div>-->
<!--                                </div>-->
<!--                                <div class="input-box">-->
<!--                                    <label>Contact Number</label>-->
<!--                                    <div class="input-like">--><?php //= $assists->contact_num?><!-- </div>-->
<!--                                </div>-->
<!--                                <div class="input-box">-->
<!--                                <label>User Type </label>-->
<!--                                <div class="input-like">--><?php //= $assists->user_type ?><!-- </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="right">-->
<!--                            <div class="photo">-->
<!--                                <img src="--><?php //= ROOT ?><!--/assets/images/vrequests/1.jpg" style="width: 200px" alt="id front">-->
<!--                                <br>-->
<!--                                <img src="--><?php //= ROOT ?><!--/assets/images/vrequests/1.jpg" style="width: 200px" alt="id back">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!---->
<!---->
<!--                    <div class="complaint-container">-->
<!--                        <div class="form" style="width: 100%">-->
<!--                            <div class="content">-->
<!--                                <h1 class="dis-flex ju-co-ce pad-20 head">Complaint Details</h1>-->
<!--                                <div class="inputflex">-->
<!--                                    <div class="input-box">-->
<!--                                        <label>User Id </label>-->
<!--                                        <div class="input-like">--><?php //= $comp->user_id ?><!-- </div>-->
<!--                                    </div>-->
<!--                                    <div class="input-box">-->
<!--                                        <label>User type</label>-->
<!--                                        <div class="input-like">--><?php //= $comp->user_type ?><!-- </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="input-box">-->
<!--                                    <label>Details</label>-->
<!--                                    <div class="input-like">--><?php //= $comp->details ?><!-- </div>-->
<!--                                </div>-->
<!--                                <div class="input-box">-->
<!--                                    <label>Timestamp</label>-->
<!--                                    <div class="input-like">--><?php //= $comp->date_time ?><!-- </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--                    <button class="btn-lay-2 hover-pointer btn-anima-hover">Verify</button>-->
<!--                    <button class="btn-lay-2 hover-pointer btn-anima-hover">Declined</button>-->
<!--                </div>-->
<!---->
<!--                    <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">-->
<!--                        <a href="--><?php //= ROOT ?><!--/cca/complaints/accepted/assists/--><?php //= $comp->comp_id ?><!--">-->
<!--                            <button class="btn-lay-2 hover-pointer btn-anima-hover">Assists</button>-->
<!--                        </a>-->
<!--                        <button class="btn-lay-2 hover-pointer btn-anima-hover" onclick="openPopup()">Handle</button>-->
<!--                    </div>-->
<!--            </div>-->
<!--        </section>-->
<!--    </main>-->
<!--</div>-->
<!--</body>-->
<!--</html>-->

<style>
    .btn{
        padding: 10px 20px;
        background: #fff;
        border: 0;
        outline: none;
        cursor: pointer;
        border-radius: 30px;
        font-size: 22px;
        font-weight: 500;
    }

    .popup{
        width: 400px;
        background: #fff;
        border-radius: 6px;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.1) ;
        text-align: center;
        padding: 0 30px 30px ;
        color: #333;
        /*visibility: hidden;*/
        /*transition: transform 0.4s, top 0.4s;*/
        display: none; /* Change visibility to display */
        transition: transform 0.4s, top 0.4s, display 0s 0.4s;
    }

    .open-popup{
        /*visibility: visible;*/
        /*top: 50%;*/
        /*transform: translate(-50%, -50%) scale(1);*/
        display: block; /* Change visibility to display */
        top: 50%;
        transform: translate(-50%, -50%) scale(1);
        transition: transform 0.4s, top 0.4s, display 0s; /* Reset delay for the display property */
    }


        .popup h2{
        margin: 30px 0 10px;
        font-size: 38px;
        font-weight: 500;
    }

    .popup button{
        width: 100%;
        padding: 10px 0;
        background: #6fd649;
        border: 0;
        outline: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 18px;
        color: #fff;
        margin-top: 50px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
</style>
<!--<style>-->
<!---->
<!--    .popup {-->
<!--        width: 400px;-->
<!--        background: #fff;-->
<!--        border-radius: 6px;-->
<!--        position: absolute;-->
<!--        top: 0;-->
<!--        left: 50%;-->
<!--        transform: translate(-50%, -50%) scale(0.1);-->
<!--        text-align: center;-->
<!--        padding: 0 30px 30px;-->
<!--        color: #333;-->
<!--        visibility: hidden;-->
<!--        transition: transform 0.4s, top 0.4s;-->
<!--    }-->
<!---->
<!--    .open-popup {-->
<!--        visibility: visible;-->
<!--        top: 50%;-->
<!--        transform: translate(-50%, -50%) scale(1);-->
<!--    }-->
<!---->
<!---->
<!--    .popup h2 {-->
<!--        margin: 30px 0 10px;-->
<!--        font-size: 38px;-->
<!--        font-weight: 500;-->
<!--    }-->
<!---->
<!--    .popup button {-->
<!--        width: 100%;-->
<!--        padding: 10px 0;-->
<!--        background: #5b00ee;-->
<!--        border: 0;-->
<!--        outline: none;-->
<!--        cursor: pointer;-->
<!--        border-radius: 4px;-->
<!--        font-size: 18px;-->
<!--        color: #fff;-->
<!--        margin-top: 50px;-->
<!--        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);-->
<!--    }-->
<!---->
<!--</style>-->
<!--user verify details-->
<html lang="en">
<?php $this->view('includes/head', ['style' => ['cca/complaintdetails.css']]) ?>
<body>
<div class="main-wrapper">
    <?php $this->view('includes/header') ?>
    <main class="dashboard-main ">
        <section class="cols-2 sidebar">
            <?php $this->view('includes/sidebar') ?>
        </section>
        <section class="cols-10 pad-20 dis-flex wid-100 hei-100 ju-co-ce al-it-ce">
            <div class="complaint-container ">
                <div class="form" style="width: 100%">
                    <div class="content">

                        <h1 class="dis-flex ju-co-ce pad-20 head">User Details</h1>
                        <div class="inputflex">
                            <div class="input-box">
                                <label>Full Name </label>
                                <div class="input-like"><?= $assists->fname." ".$assists->lname ?></div>
                            </div>
                            <div class="input-box">
                                <label>User Type</label>
                                <div class="input-like"><?= $assists->user_type ?></div>
                            </div>
                        </div>
                        <div class="inputflex">
                            <div class="input-box">
                                <label>Contact Number</label>
                                <div class="input-like"><?= $assists->contact_num?></div>
                            </div>
                            <div class="input-box">
                                <label>Nic</label>
                                <div class="input-like"><?= $assists->nic_num?> </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label>Address</label>
                            <div class="input-like"><?= $assists->address1.", ".$assists->address2.", ".$assists->province.", ".$assists->district ?>  </div>
                        </div>
                        <div class="pad-20 dis-flex gap-10 cc">
                                <img src="<?= ROOT ?>/assets/images/vrequests/1.jpg" style="width: 200px" alt="id front">
                                <img src="<?= ROOT ?>/assets/images/vrequests/1.jpg" style="width: 200px" alt="id back">
                        </div>
                    </div>
                </div>
                <?php if ($assists->status == 'New') : ?>
                    <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                        <a href="<?= ROOT ?>/cca/verify/<?= $assists->userVreq_id ?>/verified">
                            <button class="button-s2 ">Verify</button>
                        </a>
                            <button type="button" class="button-s2"  onclick="openPopup()">Declined</button>
                            <div class="popup" id="popup">
                                <form method="post" action="<?= ROOT ?>/cca/verify/<?= $assists->userVreq_id ?>/declined">

                                    <div class="input-box">
                                        <label>Reason for Declined</label>
                                        <textarea id="comment" name="comment"> </textarea>
                                    </div>
                                    <button type="submit" class="button-s2" onclick="closePopup()">Ok</button>
                                </form>
                            </div>
                        <button class="button-s2" onclick="goBack()">Back</button>
                    </div>
                <?php else : ?>
                    <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                    <button class="button-s2" onclick="goBack()">Back</button>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
</div>
<script>
    let popup = document.getElementById('popup');
    function openPopup() {
        popup.classList.add("open-popup");
    }
    function closePopup() {
        popup.classList.remove("open-popup");
    }
</script>
</body>
</html>


<style>

    .popup {
        width: 400px;
        background: #fff;
        border-radius: 6px;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translate(-50%, -50%) scale(0.1);
        text-align: center;
        padding: 0 30px 30px;
        color: #333;
        visibility: hidden;
        transition: transform 0.4s, top 0.4s;
    }

    .open-popup {
        visibility: visible;
        top: 50%;
        transform: translate(-50%, -50%) scale(1);
    }


    .popup h2 {
        margin: 30px 0 10px;
        font-size: 38px;
        font-weight: 500;
    }

    .popup button {
        width: 100%;
        padding: 10px 0;
        background: #5b00ee;
        border: 0;
        outline: none;
        cursor: pointer;
        border-radius: 4px;
        font-size: 18px;
        color: #fff;
        margin-top: 50px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }
</style>
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
            <div class="complaint-container">
                <div class="form" style="width: 100%">
                    <div class="content">
                        <h1 class="dis-flex ju-co-ce pad-20 head">Complaint Details</h1>
                        <div class="inputflex">
                            <div class="input-box">
                                <label>User Id </label>
                                <div class="input-like"><?= $comp->user_id ?> </div>
                            </div>
                            <div class="input-box">
                                <label>User type</label>
                                <div class="input-like"><?= $comp->user_type ?> </div>
                            </div>
                        </div>
                        <div class="input-box">
                            <label>Details</label>
                            <div class="input-like"><?= $comp->details ?> </div>
                        </div>
                        <div class="input-box">
                            <label>Timestamp</label>
                            <div class="input-like"><?= $comp->date_time ?> </div>
                        </div>
                    </div>
                    <!--                    accepted buttons-->
                    <?php
                    if ($status->status == 'Accepted') {
                        echo '<div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                                <a href="' . ROOT . '/cca/complaints/accepted/assists/' . $comp->comp_id . '">
                                    <button class="btn-lay-2 hover-pointer btn-anima-hover">Assists</button>
                                </a>
                                <button class="btn-lay-2 hover-pointer btn-anima-hover" onclick="openPopup()">Handle</button>
                              </div>';
                    }
                    ?>
                    <!--                    idle buttons-->
                    <?php
                    if ($status->status == 'Idle') {
                        echo '
                        <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                        <a href="<?= ROOT ?>/cca/complaints/idle/accept/<?= $comp->$comp_id ?>">
                            <button class="btn-lay-2 hover-pointer btn-anima-hover">Accept</button>
                        </a>
                    </div>';
                    }
                    ?>
                    <!--                    assist button-->
                    <?php
                    if ($status->status == 'Assist') {
                        echo '
                       <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">
                        <a href="<?= ROOT ?>/cca/complaints/assists/update/<?= $comp->$comp_id ?>">
                            <button class="btn-lay-2 hover-pointer btn-anima-hover">Update</button>
                        </a>
                    </div>';
                    }
                    ?>
                </div>
                <!--                <div class="dis-flex gap-10 ju-co-ce al-it-ce pad-20 bor-rad-5 txt-c-black">-->
                <!--                    <a href="--><?php //= ROOT ?><!--/cca/complaints/accepted/assists/-->
                <?php //= $comp->comp_id ?><!--">-->
                <!--                        <button class="btn-lay-2 hover-pointer btn-anima-hover">Assists</button>-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--                    <div class="popup" id="popup">-->
                <!--                        <h2>Handle details</h2>-->
                <!--                            <input type = "text" >-->
                <!--                        <a href="--><?php //= ROOT ?><!--/cca/complaints/accepted/handle/-->
                <?php //= $comp->comp_id ?><!--">-->
                <!--                            <button type="button" onclick="closePopup()">Ok</button>-->
                <!--                        </a>-->
                <!--                    </div>-->
                <!--                    <div class="popup" id="popup">-->
                <!--                        <h2>Handle details</h2>-->
                <!--                        <input type="text">-->
                <!--                        <a href="--><?php //= ROOT ?><!--/cca/complaints/accepted/handle/-->
                <?php //= $comp->comp_id?><!--">-->
                <!--                            <button type="button" onclick="closePopup()">Ok</button>-->
                <!--                        </a>-->
                <!--                    </div>-->
            </div>
        </section>
    </main>
</div>
<script>
    // let popup = document.getElementById('popup');
    // function openPopup() {
    //     popup.classList.add("open-popup");
    // }
    // function closePopup() {
    //     popup.classList.remove("open-popup");
    // }
    //
    // openPopup();
    let popup = document.getElementById('popup');

    function openPopup() {
        popup.classList.add("open-popup");
    }

    function closePopup() {
        popup.classList.remove("open-popup");
    }

    // Call openPopup somewhere, for example:
    openPopup();
</script>
</body>
</html>